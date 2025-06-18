<?php
$feedback = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once('formContato.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeedYou – Gestão de Estágios Inteligente</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Inter:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script defer src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
</head>

<body>
    <header>
        <div class="container nav-wrapper">
            <a href="#" class="brand-logo">
                <img src="assets/logo-needyou.png" alt="NeedYou Logo" width="120" />
            </a>
            <nav>
                <a href="#sobre">Quem Somos</a>
                <a href="#beneficios">Benefícios</a>
                <a href="#funcionalidades">Recursos</a>
                <a href="#como-funciona">Como Funciona</a>
                <a href="#unica">Porque Somos Únicos</a>
                <a href="#contato" class="nav-cta">Contato</a>
            </nav>
            <div class="menu-btn" id="menuBtn">
                <span></span><span></span><span></span>
            </div>
        </div>
    </header>
    <main>
        <!-- HERO -->
        <section class="hero hero-full" data-aos="fade">
            <div class="container hero-content hero-content-full">
                <div class="hero-bg-glass hero-bg-glass-full">
                    <h1>
                        <span class="gradient-text">O futuro</span> da gestão de estágios chegou.
                    </h1>
                    <p>
                        Automatize processos, elimine emails e papelada, e simplifique toda a experiência para empresas e
                        estagiários.<br>
                        <b>Reduza custos, economize tempo e deixe a NeedYou cuidar da burocracia para você focar no que realmente importa.</b>
                    </p>
                </div>
                <div class="hero-art">
                    <img src="assets/hero-illustration.png" alt="Gestão digital NeedYou" />
                </div>
            </div>
            <a href="#sobre" class="scroll-down" aria-label="Rolar para baixo">
                <span class="scroll-mouse"></span>
                <span class="scroll-arrow"></span>
                <span class="scroll-down-text">Role para baixo</span>
            </a>
        </section>

        <!-- SOBRE -->
        <section id="sobre" class="section section-white" data-aos="fade-up">
            <div class="container sobre-grid">
                <div class="sobre-visual" data-aos="zoom-in">
                    <img src="assets/sobre-operations.png" alt="Centro de Operações" />
                </div>
                <div class="sobre-conteudo">
                    <h2>Quem Somos</h2>
                    <p>
                        A <span class="gradient-text-bold">NeedYou</span> nasceu para revolucionar a gestão de estágios
                        no Brasil.<br>
                        Nossa solução une tecnologia robusta e suporte humano dedicado para transformar o processo de
                        ponta a ponta.
                    </p>
                    <div class="sobre-pilares">
                        <div class="pilar">
                            <div class="pilar-icone">
                                <img src="assets/icon-plataforma.png" alt="Plataforma de Tecnologia">
                            </div>
                            <div>
                                <h3>Plataforma de Tecnologia</h3>
                                <p>Transforma processos manuais em fluxos digitais — contratos, avaliações e prazos totalmente automatizados.</p>
                            </div>
                        </div>
                        <div class="pilar">
                            <div class="pilar-icone">
                                <img src="assets/icon-centro.png" alt="Centro de Operações">
                            </div>
                            <div>
                                <h3>Centro de Operações</h3>
                                <p>Suporte humano proativo que acompanha sua operação e atua com rapidez e precisão na identificação de desvios.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- VANTAGENS -->
        <section id="beneficios" class="section section-yellow" data-aos="fade-up">
            <div class="container">
                <h2>O que você ganha com a NeedYou</h2>
                <div class="vantagens-grid">
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="50">
                        <div class="vantagem-icon">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="11" stroke="#FECA17" stroke-width="2" />
                                <path d="M8 13c.39.39 1.02.39 1.41 0L12 10.41l2.59 2.59c.39.39 1.02.39 1.41 0"
                                    stroke="#111" stroke-width="1.7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3>Redução de Custos</h3>
                        <p>Economize 60% ou mais em comparação aos custos com agentes de integração e processos internos.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="vantagem-icon">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                                <rect x="4" y="4" width="16" height="20" rx="3" fill="#fff" />
                                <rect x="4" y="4" width="16" height="20" rx="3" stroke="#FECA17" stroke-width="2" />
                                <path d="M8 10h8M8 14h5" stroke="#111" stroke-width="1.7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3>Zero Papelada</h3>
                        <p>Assinaturas online, sem emails perdidos e sem documentos físicos.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="vantagem-icon">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" fill="#FECA17" stroke="#111"
                                    stroke-width="2" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3>Automação Completa</h3>
                        <p>Geração automática de contratos, aditivos, avaliações e termos.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="vantagem-icon">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                                <rect x="3.5" y="3.5" width="17" height="17" rx="4.5" fill="#fff" />
                                <rect x="3.5" y="3.5" width="17" height="17" rx="4.5" stroke="#FECA17"
                                    stroke-width="2" />
                                <path d="M8.5 14l3.5-5 3.5 5" stroke="#111" stroke-width="1.7" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <h3>Foco em Conformidade</h3>
                        <p>Gestão de processos, prazos e documentos que atendem à Lei de Estágios.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="vantagem-icon">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                                <path d="M12 22a2 2 0 002-2H10a2 2 0 002 2z" fill="#FECA17" />
                                <path d="M18 16v-5a6 6 0 10-12 0v5l-2 2v1h16v-1l-2-2z" fill="#fff" stroke="#FECA17"
                                    stroke-width="2" />
                                <path d="M8 16h8" stroke="#111" stroke-width="1.7" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3>Alertas Inteligentes</h3>
                        <p>Notificações automáticas e controle total de prazos para que não se perca nenhuma obrigação.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="vantagem-icon">
                            <svg width="28" height="28" fill="none" viewBox="0 0 24 24">
                                <path d="M16.5 3.5a2.121 2.121 0 013 3l-12 12-4 1 1-4 12-12z" fill="#FECA17"
                                    stroke="#111" stroke-width="1.7" />
                                <path d="M14.5 6.5l3 3" stroke="#111" stroke-width="1.3" stroke-linecap="round" />
                            </svg>
                        </div>
                        <h3>Avaliações Online</h3>
                        <p>Avaliações personalizadas e 100% online.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FUNCIONALIDADES -->
        <section id="funcionalidades" class="section section-white" data-aos="fade-up">
            <div class="container">
                <h2>Recursos Inteligentes para Empresas e Estagiários</h2>
                <div class="funcionalidades-blocos">
                    <div class="func-bloco" data-aos="fade-right">
                        <div class="func-bloco-icone">
                            <img src="assets/icon-empresa.png" alt="Para Empresas">
                        </div>
                        <h3>Para Empresas</h3>
                        <ul>
                            <li>Criação e assinatura digital de contratos, aditivos, encerramentos e termos de recesso</li>
                            <li>Avaliações de estágio totalmente online e personalizáveis</li>
                            <li>Gestão de usuários e permissões com diferentes níveis de acesso</li>
                            <li>Notificações automáticas e controle de prazos em tempo real</li>
                        </ul>
                    </div>
                    <div class="func-bloco" data-aos="fade-left">
                        <div class="func-bloco-icone">
                            <img src="assets/icon-plataforma.png" alt="Para Estagiários">
                        </div>
                        <h3>Para Estagiários</h3>
                        <ul>
                            <li>Acesso fácil e seguro aos documentos de estágio</li>
                            <li>Assinatura digital rápida, sem papelada</li>
                            <li>Alertas automáticos para prazos importantes</li>
                            <li>Avaliações online com preenchimento simples e intuitivo</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- PROBLEMAS RESOLVIDOS -->
        <section id="problemas" class="section section-gray" data-aos="fade-up">
            <div class="container">
                <h2>Menos problemas. Mais resultados.</h2>
                <div class="problemas-grid">
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="50">
                        <h3>
                            <svg width="22" height="22" style="vertical-align:middle;margin-bottom:3px;" fill="none"
                                viewBox="0 0 24 24">
                                <rect x="4" y="4" width="16" height="16" rx="4" fill="#FECA17" stroke="#111"
                                    stroke-width="2" />
                                <path d="M8 12h8" stroke="#111" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            Processos Burocráticos
                        </h3>
                        <p>Assine tudo online e diga adeus à papelada e ao retrabalho.</p>
                    </div>
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="100">
                        <h3>
                            <svg width="22" height="22" style="vertical-align:middle;margin-bottom:3px;" fill="none"
                                viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="#FECA17" stroke-width="2" />
                                <path d="M12 8v4l3 3" stroke="#111" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Falta de Controle
                        </h3>
                        <p>Nunca mais perca um prazo: alertas e dashboards cuidam disso por você.</p>
                    </div>
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="150">
                        <h3>
                            <svg width="22" height="22" style="vertical-align:middle;margin-bottom:3px;" fill="none"
                                viewBox="0 0 24 24">
                                <rect x="4" y="4" width="16" height="16" rx="4" fill="#FECA17" stroke="#111"
                                    stroke-width="2" />
                                <path d="M9 9l6 6M15 9l-6 6" stroke="#111" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            Erros de Conformidade
                        </h3>
                        <p>Modelos atualizados e gestão centralizada para que reduzem significativamente os riscos legais.</p>
                    </div>
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="200">
                        <h3>
                            <svg width="22" height="22" style="vertical-align:middle;margin-bottom:3px;" fill="none"
                                viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke="#FECA17" stroke-width="2" />
                                <path d="M8 16l4-8 4 8" stroke="#111" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Tempo Gasto
                        </h3>
                        <p>Automatize o operacional e ganhe tempo para o que realmente importa.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- COMO FUNCIONA -->
        <section id="como-funciona" class="section section-yellow" data-aos="fade-up">
            <div class="container">
                <h2>Fluxo Simples. Gestão Poderosa.</h2>
                <div class="funciona-fluxo">
                    <div class="fluxo-item" data-aos="zoom-in" data-aos-delay="80">
                        <div class="fluxo-circle">
                            <img src="assets/icon-empresa.png" alt="Empresa">
                        </div>
                        <p>Cadastre os estágios e inicie a jornada em poucos cliques.</p>
                    </div>
                    <div class="fluxo-seta">
                        <svg width="32" height="32">
                            <path d="M5 16h22m-7-7 7 7-7 7" stroke="#111" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <div class="fluxo-item" data-aos="zoom-in" data-aos-delay="160">
                        <div class="fluxo-circle">
                            <img src="assets/icon-plataforma.png" alt="Plataforma">
                        </div>
                        <p>A geração de documentos, assinaturas e prazos é toda automatizada.</p>
                    </div>
                    <div class="fluxo-seta">
                        <svg width="32" height="32">
                            <path d="M5 16h22m-7-7 7 7-7 7" stroke="#111" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <div class="fluxo-item" data-aos="zoom-in" data-aos-delay="240">
                        <div class="fluxo-circle">
                            <img src="assets/icon-centro.png" alt="Centro de Operações">
                        </div>
                        <p>Nosso time acompanha os estágios e atua em potenciais desvios, auxiliando a garantir a conformidade.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ÚNICA -->
        <section id="unica" class="section section-white unica-section" data-aos="fade-up">
            <div class="container unica-container">
                <div class="unica-grafico">
                    <img src="assets/identidade-unica.png" alt="Ecossistema NeedYou" />
                </div>
                <div class="unica-conteudo">
                    <h2>Feita para Empresas. Pensada para Estágios.</h2>
                    <p>
                        A NeedYou nasceu para preencher uma lacuna no mercado: <b>uma plataforma de estágios feita sob medida para empresas.</b><br>
                    <p> Aqui, você encontra tecnologia que automatiza processos e simplifica a gestão de ponta a ponta — <b>uma solução feita para quem realmente precisa de resultados.</b>
                    <p>
                    <h3>É gestão de estágios com visão empresarial!</h3>
                    </p>
                    </p>
                    <div class="unica-itens">
                        <div class="unica-item">
                            <span class="unica-icon">🏢</span>
                            <span>Empresas</span>
                        </div>
                        <div class="unica-item">
                            <span class="unica-icon">🎓</span>
                            <span>Instituições de Ensino</span>
                        </div>
                        <div class="unica-item">
                            <span class="unica-icon">💡</span>
                            <span>Talentos</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CONTATO -->
        <section id="contato" class="section section-gray" data-aos="fade-up">
            <div class="container contato-container">
                <div class="contato-info">
                    <h2>Contato para Instituições de Ensino</h2>
                    <p>Quer saber como a NeedYou pode apoiar sua instituição?<br><b>Fale conosco!</b></p>
                </div>
                <form method="POST" class="form-contato" autocomplete="off">
                    <?php if ($feedback) {
                        echo "<div class='feedback'>$feedback</div>";
                    } ?>
                    <div class="form-group">
                        <input type="text" name="nome" placeholder="Seu nome" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Seu e-mail institucional" required>
                    </div>
                    <div class="form-group">
                        <textarea name="mensagem" placeholder="Mensagem" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-cta">Enviar mensagem</button>
                </form>
            </div>
        </section>
    </main>
    <footer>
        <div class="container center">
            <span class="footer-logo">
                <img src="assets/logo-needyou.png" alt="Logo NeedYou" width="100" height="32" />
            </span>
            <p>©
                <?php echo date('Y'); ?> NeedYou. Todos os direitos reservados.
            </p>
        </div>
    </footer>
    <script>
        AOS.init();
    </script>
</body>

</html>