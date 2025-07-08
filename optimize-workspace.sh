#!/bin/bash

# VS Code Workspace Optimization Script for LAMP Docker
# This script helps manage VS Code performance with multiple submodules

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

print_status() {
    echo -e "${GREEN}[INFO]${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}[WARNING]${NC} $1"
}

print_error() {
    echo -e "${RED}[ERROR]${NC} $1"
}

print_header() {
    echo -e "${BLUE}=== $1 ===${NC}"
}

show_help() {
    echo "🚀 Workspace Optimization Script"
    echo ""
    echo "Usage: $0 [command]"
    echo ""
    echo "Commands:"
    echo "  focus <project>     - Focus only on specific project"
    echo "  show-all           - Show all submodules"
    echo "  hide-all           - Hide all submodules for performance"
    echo "  status             - Show current optimization status"
    echo "  clean              - Clean cache files for better performance"
    echo ""
    echo "Projects:"
    echo "  badminton-app      - React Badminton App"
    echo "  propolife-webs     - Portfolio Websites"
    echo "  nhatansteel-src    - Backend Application"
    echo "  nhatansteel-fe     - Frontend Application"
    echo ""
    echo "Examples:"
    echo "  $0 focus badminton-app   # Work only on badminton app"
    echo "  $0 hide-all             # Hide all for maximum performance"
    echo "  $0 clean                # Clean cache files"
}

# Function to update VS Code settings
update_vscode_settings() {
    local mode="$1"
    local project="$2"
    
    print_status "Updating VS Code settings for $mode mode..."
    
    # Backup current settings
    if [ -f ".vscode/settings.json" ]; then
        cp .vscode/settings.json .vscode/settings.json.backup
        print_status "Settings backed up to .vscode/settings.json.backup"
    fi
    
    case $mode in
        "focus")
            create_focus_settings "$project"
            ;;
        "show-all")
            create_show_all_settings
            ;;
        "hide-all")
            create_hide_all_settings
            ;;
    esac
    
    print_status "VS Code settings updated successfully"
}

# Function to create focus settings for specific project
create_focus_settings() {
    local project="$1"
    
    cat > .vscode/settings.json << EOF
{
    // === FOCUSED MODE: $project ===
    "files.exclude": {
        "data": true,
        "logs": true,
$(for submodule in nhatansteel-src nhatansteel-fe propolife-webs badminton-app; do
    if [ "$submodule" != "$project" ]; then
        echo "        \"src/$submodule\": true,"
    fi
done)
        "**/.git": true,
        "**/.DS_Store": true,
        "**/Thumbs.db": true
    },
    "search.exclude": {
        "node_modules": true,
        "vendor": true,
        "data": true,
        "logs": true,
$(for submodule in nhatansteel-src nhatansteel-fe propolife-webs badminton-app; do
    if [ "$submodule" != "$project" ]; then
        echo "        \"src/$submodule\": true,"
    fi
done)
        "**/.git": true,
        "**/*.min.js": true,
        "**/*.min.css": true
    },
    "files.watcherExclude": {
        "**/node_modules/**": true,
        "**/vendor/**": true,
        "**/data/**": true,
        "**/logs/**": true,
        "**/.git/**": true,
$(for submodule in nhatansteel-src nhatansteel-fe propolife-webs badminton-app; do
    if [ "$submodule" != "$project" ]; then
        echo "        \"src/$submodule/**\": true,"
    fi
done)
        "**/storage/**": true,
        "**/bootstrap/cache/**": true
    },
    
    // === GIT OPTIMIZATION ===
    "git.autoRepositoryDetection": "subFolders",
    "git.scanRepositories": ["src/$project"],
    "git.ignoreLimitWarning": true,
    
    // === COPILOT OPTIMIZATION ===
    "github.copilot.enable": {
        "*": true,
        "plaintext": false,
        "markdown": false,
        "scminput": false
    },
    "github.copilot.advanced": {
        "length": 500,
        "temperature": 0.1,
        "listCount": 3
    },
    
    // === PERFORMANCE SETTINGS ===
    "typescript.preferences.includePackageJsonAutoImports": "off",
    "php.suggest.basic": false,
    "extensions.autoUpdate": false,
    "workbench.settings.enableNaturalLanguageSearch": false,
    "terminal.integrated.enableFileLinks": "off",
    
    // === FILE ASSOCIATIONS ===
    "files.associations": {
        "*.blade.php": "blade",
        "*.php": "php",
        "*.env*": "dotenv"
    },
    
    // === EXPLORER OPTIMIZATIONS ===
    "explorer.fileNesting.enabled": true,
    "explorer.fileNesting.expand": false,
    "explorer.fileNesting.patterns": {
        "package.json": "package-lock.json, yarn.lock, pnpm-lock.yaml",
        "composer.json": "composer.lock",
        ".env": ".env.*"
    }
}
EOF
}

# Function to create show all settings
create_show_all_settings() {
    cat > .vscode/settings.json << 'EOF'
{
    // === SHOW ALL MODE ===
    "files.exclude": {
        "data": true,
        "logs": true,
        "**/.git": true,
        "**/.DS_Store": true,
        "**/Thumbs.db": true
    },
    "search.exclude": {
        "**/node_modules": true,
        "**/vendor": true,
        "data": true,
        "logs": true,
        "**/.git": true,
        "**/*.min.js": true,
        "**/*.min.css": true
    },
    "files.watcherExclude": {
        "**/node_modules/**": true,
        "**/vendor/**": true,
        "**/data/**": true,
        "**/logs/**": true,
        "**/.git/**": true,
        "**/storage/**": true,
        "**/bootstrap/cache/**": true
    },
    
    // === GIT OPTIMIZATION ===
    "git.autoRepositoryDetection": "subFolders",
    "git.ignoreLimitWarning": true,
    
    // === COPILOT OPTIMIZATION ===
    "github.copilot.enable": {
        "*": true,
        "plaintext": false,
        "markdown": false,
        "scminput": false
    },
    
    // === PERFORMANCE SETTINGS ===
    "typescript.preferences.includePackageJsonAutoImports": "off",
    "php.suggest.basic": false,
    "extensions.autoUpdate": false,
    "workbench.settings.enableNaturalLanguageSearch": false,
    "terminal.integrated.enableFileLinks": "off",
    
    // === FILE ASSOCIATIONS ===
    "files.associations": {
        "*.blade.php": "blade",
        "*.php": "php",
        "*.env*": "dotenv"
    },
    
    // === EXPLORER OPTIMIZATIONS ===
    "explorer.fileNesting.enabled": true,
    "explorer.fileNesting.expand": false,
    "explorer.fileNesting.patterns": {
        "package.json": "package-lock.json, yarn.lock, pnpm-lock.yaml",
        "composer.json": "composer.lock",
        ".env": ".env.*"
    }
}
EOF
}

# Function to create hide all settings
create_hide_all_settings() {
    cat > .vscode/settings.json << 'EOF'
{
    // === HIDE ALL MODE - MAXIMUM PERFORMANCE ===
    "files.exclude": {
        "src/nhatansteel-src": true,
        "src/nhatansteel-fe": true,
        "src/propolife-webs": true,
        "src/badminton-app": true,
        "data": true,
        "logs": true,
        "**/.git": true,
        "**/.DS_Store": true,
        "**/Thumbs.db": true
    },
    "search.exclude": {
        "src": true,
        "node_modules": true,
        "vendor": true,
        "data": true,
        "logs": true,
        "**/.git": true
    },
    "files.watcherExclude": {
        "src/**": true,
        "**/node_modules/**": true,
        "**/vendor/**": true,
        "**/data/**": true,
        "**/logs/**": true,
        "**/.git/**": true
    },
    
    // === GIT OPTIMIZATION ===
    "git.autoRepositoryDetection": false,
    "git.scanRepositories": [],
    
    // === COPILOT OPTIMIZATION ===
    "github.copilot.enable": {
        "*": true,
        "plaintext": false,
        "markdown": false,
        "scminput": false
    },
    
    // === PERFORMANCE SETTINGS ===
    "typescript.preferences.includePackageJsonAutoImports": "off",
    "php.suggest.basic": false,
    "extensions.autoUpdate": false,
    "workbench.settings.enableNaturalLanguageSearch": false,
    "terminal.integrated.enableFileLinks": "off",
    
    // === FILE ASSOCIATIONS ===
    "files.associations": {
        "*.blade.php": "blade",
        "*.php": "php",
        "*.env*": "dotenv"
    }
}
EOF
}

# Function to focus on specific project
focus_project() {
    local project="$1"
    
    if [ -z "$project" ]; then
        print_error "Please specify a project to focus on"
        show_help
        exit 1
    fi
    
    # Check if project exists
    if [ ! -d "src/$project" ]; then
        print_error "Project 'src/$project' does not exist"
        echo "Available projects:"
        for submodule in src/*/; do
            if [ -d "$submodule" ]; then
                echo "  - $(basename "$submodule")"
            fi
        done
        exit 1
    fi
    
    print_header "Focusing on: $project"
    update_vscode_settings "focus" "$project"
    
    print_status "✅ Focused on $project"
    print_status "📂 Active project: src/$project"
    print_warning "💡 Restart VS Code for best performance"
}

# Function to show all submodules
show_all() {
    print_header "Showing All Submodules"
    update_vscode_settings "show-all"
    
    print_status "✅ All submodules are now visible"
    print_warning "⚠️ Performance may be impacted with many submodules"
    print_warning "💡 Restart VS Code for best performance"
}

# Function to hide all submodules
hide_all() {
    print_header "Hiding All Submodules (Maximum Performance)"
    update_vscode_settings "hide-all"
    
    print_status "✅ All submodules hidden for maximum performance"
    print_status "🔧 Use this mode for Docker management and configuration"
    print_warning "💡 Restart VS Code for best performance"
}

# Function to show current status
show_status() {
    print_header "Current Workspace Status"
    
    echo ""
    if [ -f ".vscode/settings.json" ]; then
        print_status "VS Code settings exist"
        
        # Check which mode is active
        if grep -q "HIDE ALL MODE" .vscode/settings.json; then
            echo "  🙈 Mode: Hide All (Maximum Performance)"
        elif grep -q "SHOW ALL MODE" .vscode/settings.json; then
            echo "  👁️ Mode: Show All"
        elif grep -q "FOCUSED MODE" .vscode/settings.json; then
            local focused_project=$(grep "FOCUSED MODE" .vscode/settings.json | sed 's/.*FOCUSED MODE: \(.*\) ===/\1/')
            echo "  🎯 Mode: Focused on $focused_project"
        else
            echo "  ❓ Mode: Custom/Unknown"
        fi
        
        # Show excluded directories
        echo ""
        echo "Excluded from file explorer:"
        grep '".*": true' .vscode/settings.json | grep -E "(src/|node_modules|vendor|data|logs)" | sed 's/^[[:space:]]*/  /' | head -5
        if [ $(grep '".*": true' .vscode/settings.json | grep -E "(src/|node_modules|vendor|data|logs)" | wc -l) -gt 5 ]; then
            echo "  ... and more"
        fi
    else
        print_warning "No VS Code settings found"
    fi
    
    echo ""
    echo "Available submodules:"
    for submodule in src/*/; do
        if [ -d "$submodule" ]; then
            local basename=$(basename "$submodule")
            local size=$(du -sh "$submodule" 2>/dev/null | cut -f1)
            echo "  📁 $basename ($size)"
        fi
    done
    
    echo ""
    print_status "Performance tips:"
    echo "  • Use 'focus <project>' to work on one project"
    echo "  • Use 'hide-all' for Docker management"
    echo "  • Use 'clean' to remove cache files"
    echo "  • Restart VS Code after changing modes"
}

# Function to clean cache files
clean_cache() {
    print_header "Cleaning Cache Files"
    
    local cleaned=0
    
    for dir in src/*/; do
        if [ -d "$dir" ]; then
            local project_name=$(basename "$dir")
            print_status "Cleaning $project_name..."
            
            # Remove Laravel cache
            if [ -d "$dir/storage/framework/cache" ]; then
                rm -rf "$dir/storage/framework/cache"/*
                print_status "  ✓ Laravel framework cache"
                cleaned=1
            fi
            
            if [ -d "$dir/storage/logs" ]; then
                find "$dir/storage/logs" -name "*.log" -delete 2>/dev/null || true
                print_status "  ✓ Log files"
                cleaned=1
            fi
            
            if [ -d "$dir/bootstrap/cache" ]; then
                rm -rf "$dir/bootstrap/cache"/*
                print_status "  ✓ Bootstrap cache"
                cleaned=1
            fi
            
            # Remove build artifacts
            for build_dir in dist build coverage .next; do
                if [ -d "$dir/$build_dir" ]; then
                    rm -rf "$dir/$build_dir"
                    print_status "  ✓ $build_dir directory"
                    cleaned=1
                fi
            done
            
            # Remove IDE cache
            if [ -d "$dir/.vscode" ]; then
                rm -f "$dir/.vscode/settings.json.backup"
                print_status "  ✓ VS Code backup files"
                cleaned=1
            fi
        fi
    done
    
    # Clean main project cache
    if [ -d "data" ]; then
        print_status "Docker data directory size: $(du -sh data 2>/dev/null | cut -f1)"
    fi
    
    if [ -f ".vscode/settings.json.backup" ]; then
        rm -f .vscode/settings.json.backup
        print_status "✓ VS Code backup files"
        cleaned=1
    fi
    
    if [ $cleaned -eq 1 ]; then
        print_status "✅ Cache cleaning completed"
    else
        print_status "📁 No cache files found to clean"
    fi
    
    print_warning "💡 Restart VS Code for best performance after cleaning"
}

# Main script logic
main() {
    # Check if we're in the correct directory
    if [ ! -f "docker-compose.yml" ]; then
        print_error "This script must be run from the LAMP-docker root directory"
        exit 1
    fi
    
    case "${1:-help}" in
        "focus")
            focus_project "$2"
            ;;
        "show-all")
            show_all
            ;;
        "hide-all")
            hide_all
            ;;
        "status")
            show_status
            ;;
        "clean")
            clean_cache
            ;;
        "help"|*)
            show_help
            ;;
    esac
}

# Run main function with all arguments
main "$@"
