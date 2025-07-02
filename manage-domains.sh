#!/bin/bash

# Script to manage local domain configuration
# Usage: ./manage-domains.sh [command]

# Function to get all folders in src directory
get_src_folders() {
    if [ -d "src" ]; then
        find src -maxdepth 1 -type d -not -path "src" -exec basename {} \;
    fi
}

# Function to generate domains array dynamically
generate_domains() {
    local domains=()
    while IFS= read -r folder; do
        if [ -n "$folder" ]; then
            domains+=("$folder.test")
        fi
    done < <(get_src_folders)
    echo "${domains[@]}"
}

show_help() {
    echo "Usage: $0 [command]"
    echo ""
    echo "Commands:"
    echo "  setup               - Setup all domains (add to /etc/hosts)"
    echo "  remove              - Remove all domains from /etc/hosts"
    echo "  list                - List configured domains"
    echo "  status              - Show current hosts configuration"
    echo "  restart-nginx       - Restart nginx container"
    echo "  scan                - Scan src folder for new projects"
    echo ""
    echo "Available domains (auto-detected from src/ folders):"
    local domains=($(generate_domains))
    for domain in "${domains[@]}"; do
        echo "  - http://$domain"
    done
    echo ""
    echo "Note: This script may require sudo privileges to modify /etc/hosts"
}

setup_domains() {
    echo "=== Setting up local domains ==="
    
    # Get current domains from src folders
    local domains=($(generate_domains))
    
    if [ ${#domains[@]} -eq 0 ]; then
        echo "No folders found in src/ directory. Please create some projects first."
        return 1
    fi
    
    # Backup hosts file
    if [ ! -f /etc/hosts.backup ]; then
        echo "Creating backup of /etc/hosts..."
        sudo cp /etc/hosts /etc/hosts.backup
    fi
    
    # Add domains to hosts file
    for domain in "${domains[@]}"; do
        if ! grep -q "$domain" /etc/hosts; then
            echo "Adding $domain to /etc/hosts..."
            echo "127.0.0.1    $domain" | sudo tee -a /etc/hosts > /dev/null
        else
            echo "$domain already exists in /etc/hosts"
        fi
    done
    
    echo ""
    echo "✅ Domain setup completed!"
    echo "You can now access:"
    for domain in "${domains[@]}"; do
        echo "  - http://$domain"
    done
}

remove_domains() {
    echo "=== Removing local domains ==="
    
    local domains=($(generate_domains))
    
    for domain in "${domains[@]}"; do
        if grep -q "$domain" /etc/hosts; then
            echo "Removing $domain from /etc/hosts..."
            sudo sed -i "/$domain/d" /etc/hosts
        else
            echo "$domain not found in /etc/hosts"
        fi
    done
    
    echo "✅ Domains removed successfully!"
}

list_domains() {
    echo "Available domains (auto-detected from src/ folders):"
    local domains=($(generate_domains))
    for domain in "${domains[@]}"; do
        echo "  - http://$domain"
    done
}

scan_folders() {
    echo "=== Scanning src/ folder for projects ==="
    echo ""
    
    if [ ! -d "src" ]; then
        echo "❌ src/ folder not found!"
        return 1
    fi
    
    local folders=($(get_src_folders))
    
    if [ ${#folders[@]} -eq 0 ]; then
        echo "No folders found in src/ directory."
        return 1
    fi
    
    echo "Found ${#folders[@]} project(s):"
    for folder in "${folders[@]}"; do
        local domain="$folder.test"
        local path="src/$folder"
        
        echo "📁 $folder"
        echo "   Domain: http://$domain"
        echo "   Path: $path"
        
        # Check if it has common web files
        if [ -f "$path/index.php" ] || [ -f "$path/index.html" ] || [ -f "$path/package.json" ]; then
            echo "   Status: ✅ Web project detected"
        else
            echo "   Status: ⚠️  No web files detected"
        fi
        echo ""
    done
}

show_status() {
    echo "=== Current hosts configuration ==="
    echo "Checking /etc/hosts for configured domains:"
    echo ""
    
    local domains=($(generate_domains))
    
    for domain in "${domains[@]}"; do
        if grep -q "$domain" /etc/hosts; then
            echo "✅ $domain - configured"
        else
            echo "❌ $domain - not configured"
        fi
    done
    
    echo ""
    echo "=== Docker services status ==="
    docker compose ps
}

restart_nginx() {
    echo "=== Restarting nginx container ==="
    docker compose restart nginx
    echo "✅ Nginx restarted!"
}

case "$1" in
    "setup")
        setup_domains
        ;;
    "remove")
        remove_domains
        ;;
    "list")
        list_domains
        ;;
    "status")
        show_status
        ;;
    "restart-nginx")
        restart_nginx
        ;;
    "scan")
        scan_folders
        ;;
    *)
        show_help
        ;;
esac
