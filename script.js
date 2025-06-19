document.addEventListener('DOMContentLoaded', function () {
    if (window.AOS) {
        AOS.init({
            duration: 900,
            once: true,
        });
    }

    // Menu responsivo
    const menuBtn = document.getElementById('menuBtn');
    const nav = document.querySelector('nav');
    if (menuBtn && nav) {
        menuBtn.addEventListener('click', () => {
            nav.classList.toggle('open');
        });
        // Fecha menu quando clica fora
        document.addEventListener('click', (e) => {
            if (!menuBtn.contains(e.target) && !nav.contains(e.target)) {
                nav.classList.remove('open');
            }
        });
    }
});
// Dialog Lead
const leadDialog = document.getElementById('leadDialog');
const leadForm = document.getElementById('leadForm');
const leadClose = document.getElementById('leadClose');
const leadError = document.getElementById('lead-error');
const leadSuccess = document.getElementById('lead-success');

// Abre o dialog ao clicar em qualquer CTA
document.querySelectorAll('.btn-cta').forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        leadForm.reset();
        leadError.style.display = 'none';
        leadSuccess.style.display = 'none';
        leadDialog.showModal();
    });
});

// Fecha o dialog
leadClose.addEventListener('click', () => {
    leadDialog.close();
});

// Submissão do formulário via Fetch com validação do captcha
leadForm.addEventListener('submit', async e => {
    e.preventDefault();
    leadError.style.display = 'none';
    leadSuccess.style.display = 'none';

    const data = {
        nome: leadForm['nome'].value.trim(),
        empresa: leadForm['empresa'].value.trim(),
        cargo: leadForm['cargo'].value.trim(),
        email: leadForm['email'].value.trim(),
        celular: leadForm['celular'].value.trim()
    };

    for (const key in data) {
        if (!data[key]) {
            leadError.textContent = 'Preencha todos os campos obrigatórios.';
            leadError.style.display = 'block';
            return;
        }
    }

    // Solicita o token do reCAPTCHA v3
    grecaptcha.ready(function () {
        grecaptcha.execute('6Lfdq2YrAAAAADseSGyCiR9Fx9igOVlhWlwQMco2', { action: 'submit' }).then(async function (token) {
            try {
                const resp = await fetch('./api/lead.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ ...data, recaptchaToken: token })
                });
                if (!resp.ok) throw new Error('Falha ao enviar. Tente novamente.');
                leadSuccess.textContent = 'Enviado com sucesso! Obrigado pelo interesse.';
                leadSuccess.style.display = 'block';
                leadForm.reset();
                setTimeout(() => leadDialog.close(), 1800);
            } catch (err) {
                leadError.textContent = err.message;
                leadError.style.display = 'block';
            }
        });
    });
});

