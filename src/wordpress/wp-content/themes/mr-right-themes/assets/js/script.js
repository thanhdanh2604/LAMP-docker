document.addEventListener('DOMContentLoaded', function () {
    const toggles = document.querySelectorAll('.submenu-toggle');
  
    toggles.forEach(function (toggle) {
      toggle.addEventListener('click', function (e) {
        e.preventDefault();
  
        const parent = toggle.closest('.has-submenu');
        if (!parent) return;
  
        const submenu = parent.querySelector('.submenu');
        if (!submenu) return;
  
        const isOpen = submenu.style.display === 'block';
        submenu.style.display = isOpen ? 'none' : 'block';
  
        toggle.textContent = isOpen ? '▼' : '▲';
      });
    });


    const openBtn = document.getElementById('open-popup-btn');
    const closeBtn = document.getElementById('popup-close');
    const overlay = document.getElementById('popup-overlay');

    openBtn.addEventListener('click', () => {
      overlay.classList.add('active');
      document.body.classList.add('popup-open');
    });

    closeBtn.addEventListener('click', () => {
      overlay.classList.remove('active');
      document.body.classList.remove('popup-open');
    });

    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) {
        overlay.classList.remove('active');
        document.body.classList.remove('popup-open');
      }
    });

    document.getElementById('inquiry-custom-form').addEventListener('submit', function (e) {
      e.preventDefault();
    
      const customForm = document.getElementById('inquiry-custom-form');
      const cf7Form = document.querySelector('.wpcf7');
      const formData = new FormData();
    
      const customInputs = customForm.querySelectorAll('input, textarea, select');
      customInputs.forEach(input => {
        if (input.name && input.value) {
          formData.append(input.name, input.value);
        }
      });
    
      const cf7Inputs = cf7Form.querySelectorAll('input, textarea, select');
      cf7Inputs.forEach(input => {
        if (input.name && input.value) {
          formData.append(input.name, input.value);
        }
      });
    
      
      const formId = cf7Form.dataset.wpcf7Id;
    
      const submitButton = customForm.querySelector('button[type="submit"]');
      const responseError = document.getElementById('form-field-error');
      const responseSucees =  document.getElementById('form-field-success');
      const containerRespon = document.getElementById('form-response');
    
      submitButton.disabled = true;
      submitButton.classList.add('disabled');
      responseSucees.innerHTML = '';
      responseError.innerHTML = '';
      containerRespon.classList.add('hidden');
    
      if (!formId) {
        console.error('Form Not Found');
        submitButton.disabled = false;
        submitButton.classList.remove('disabled');
        return;
      }
    
      fetch(`/wp-json/contact-form-7/v1/contact-forms/${formId}/feedback`, {
        method: 'POST',
        body: formData
      })
        .then(res => res.json())
        .then(data => {
          containerRespon.classList.remove('hidden');
    
          if (data.status === 'mail_sent') {
            responseSucees.innerHTML = '✅ Sent successfully!';
            responseSucees.style.display = 'block';
            responseError.style.display = 'none';

            setTimeout(() => {
              customForm.classList.add('hidden');
            }, 500);
           
            customForm.reset();
          } else {
            responseError.innerHTML = `❌ ${data.message || 'Unable to send!'}`;
            responseError.style.display = 'block';
            responseSucees.style.display = 'none';
          }
        })
        .catch(error => {
          console.error('Error:', error);
        })
        .finally(() => {
          submitButton.disabled = false;
          submitButton.classList.remove('disabled');
        });
    });
    
    
  });
  