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
    <!-- Tabler Icons Webfont CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
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
                        Automatize a gestão de estágios, elimine a papelada e reduza custos.<br>
                        <b>Com a NeedYou, sua empresa economiza tempo, se livra da burocracia e foca no que realmente importa: desenvolver talentos e gerar resultados.</b>
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
                                <i class="ti ti-device-desktop"></i>
                            </div>
                            <div>
                                <h3>Plataforma de Tecnologia</h3>
                                <p>Transforma processos manuais em fluxos digitais — contratos, avaliações e prazos
                                    totalmente automatizados.</p>
                            </div>
                        </div>
                        <div class="pilar">
                            <div class="pilar-icone">
                                <i class="ti ti-users-group"></i>
                            </div>
                            <div>
                                <h3>Centro de Operações</h3>
                                <p>Suporte humano proativo que acompanha sua operação e atua com rapidez e precisão na
                                    identificação de desvios.</p>
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
                            <i class="ti ti-pig-money"></i>
                        </div>
                        <h3>Redução de Custos</h3>
                        <p>Economize 60% ou mais em comparação aos custos com agentes de integração e processos
                            internos.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="vantagem-icon">
                            <i class="ti ti-file-digit"></i>
                        </div>
                        <h3>Zero Papelada</h3>
                        <p>Assinaturas online, sem emails perdidos e sem documentos físicos.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="vantagem-icon">
                            <i class="ti ti-robot"></i>
                        </div>
                        <h3>Automação Completa</h3>
                        <p>Geração automática de contratos, aditivos, avaliações e termos.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="vantagem-icon">
                            <i class="ti ti-shield-check"></i>
                        </div>
                        <h3>Foco em Conformidade</h3>
                        <p>Gestão de processos, prazos e documentos que atendem à Lei de Estágios.</p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="vantagem-icon">
                            <i class="ti ti-bell-ringing"></i>
                        </div>
                        <h3>Alertas Inteligentes</h3>
                        <p>Notificações automáticas e controle total de prazos para que não se perca nenhuma obrigação.
                        </p>
                    </div>
                    <div class="vantagem-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="vantagem-icon">
                            <i class="ti ti-clipboard-check"></i>
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
                            <i class="ti ti-building"></i>
                        </div>
                        <h3>Para Empresas</h3>
                        <ul>
                            <li>Criação e assinatura digital de contratos, aditivos, encerramentos e termos de recesso
                            </li>
                            <li>Avaliações de estágio totalmente online e personalizáveis</li>
                            <li>Gestão de usuários e permissões com diferentes níveis de acesso</li>
                            <li>Notificações automáticas e controle de prazos em tempo real</li>
                        </ul>
                    </div>
                    <div class="func-bloco" data-aos="fade-left">
                        <div class="func-bloco-icone">
                            <i class="ti ti-id-badge-2"></i>
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
                            <i class="ti ti-file-x"></i>
                            Processos Burocráticos
                        </h3>
                        <p>Assine tudo online e diga adeus à papelada e ao retrabalho.</p>
                    </div>
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="100">
                        <h3>
                            <i class="ti ti-alert-circle"></i>
                            Falta de Controle
                        </h3>
                        <p>Nunca mais perca um prazo: alertas e dashboards cuidam disso por você.</p>
                    </div>
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="150">
                        <h3>
                            <i class="ti ti-shield-off"></i>
                            Erros de Conformidade
                        </h3>
                        <p>Modelos atualizados e gestão centralizada para que reduzem significativamente os riscos
                            legais.</p>
                    </div>
                    <div class="problema-card" data-aos="flip-up" data-aos-delay="200">
                        <h3>
                            <i class="ti ti-hourglass"></i>
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
                        <i class="ti ti-file-plus"></i>
                        <p>Cadastre os estágios e inicie a jornada em poucos cliques.</p>
                    </div>
                    <div class="fluxo-seta">
                        <svg width="32" height="32">
                            <path d="M5 16h22m-7-7 7 7-7 7" stroke="#111" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <div class="fluxo-item" data-aos="zoom-in" data-aos-delay="160">
                        <i class="ti ti-settings-cog"></i>
                        <p>A geração de documentos, assinaturas e prazos é toda automatizada.</p>
                    </div>
                    <div class="fluxo-seta">
                        <svg width="32" height="32">
                            <path d="M5 16h22m-7-7 7 7-7 7" stroke="#111" stroke-width="2" fill="none" />
                        </svg>
                    </div>
                    <div class="fluxo-item" data-aos="zoom-in" data-aos-delay="240">
                        <i class="ti ti-user-star"></i>
                        <p>Nosso time acompanha os estágios e atua em potenciais desvios, auxiliando a garantir a
                            conformidade.</p>
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
                        A NeedYou nasceu para preencher uma lacuna no mercado: <b>uma plataforma de estágios feita sob
                            medida para empresas.</b><br>
                    <p> Aqui, você encontra tecnologia que automatiza processos e simplifica a gestão de ponta a ponta —
                        <b>uma solução feita para quem realmente precisa de resultados.</b>
                    <p>
                    <h3>É gestão de estágios com visão empresarial!</h3>
                    </p>
                    </p>
                    <!-- <div class="unica-itens">
                        <div class="unica-item">
                            <i class="ti ti-building"></i>
                            <span>Empresas</span>
                        </div>
                        <div class="unica-item">
                            <i class="ti ti-school"></i>
                            <span>Instituições de Ensino</span>
                        </div>
                        <div class="unica-item">
                            <i class="ti ti-bulb"></i>
                            <span>Talentos</span>
                        </div>
                    </div> -->
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
    <footer class="footer-ny">
        <div class="footer-top">
            <div class="container footer-grid">
                <div class="footer-col footer-brand">
                    <img src="assets/logo-needyou-white.png" alt="Logo NeedYou" width="170" />
                    <p style="margin-top: 0px;">Inovação e tecnologia para transformar a gestão de estágios no Brasil.</p>
                    <div class="footer-social">
                        <a href="#" aria-label="Instagram" target="_blank"><i class="ti ti-brand-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn" target="_blank"><i class="ti ti-brand-linkedin"></i></a>
                        <a href="#" aria-label="YouTube" target="_blank"><i class="ti ti-brand-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Sobre</h4>
                    <ul>
                        <li><a href="#sobre">Quem Somos</a></li>
                        <li><a href="#beneficios">Benefícios</a></li>
                        <li><a href="#funcionalidades">Recursos</a></li>
                        <li><a href="#como-funciona">Como Funciona</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Ajuda & Tutoriais</h4>
                    <ul>
                        <li><a href="#">Central de Ajuda</a></li>
                        <li><a href="#">Tutoriais em Vídeo</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Documentação</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="#">Termos de Serviço</a></li>
                        <li><a href="#">Política de Cookies</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contato</h4>
                    <ul>
                        <li><a href="mailto:contato@needyou.com.br"><i class="ti ti-mail"></i>
                                contato@needyou.com.br</a></li>
                        <li><a href="tel:+5511999999999"><i class="ti ti-phone"></i> (11) 99999-9999</a></li>
                        <li><a href="#contato"><i class="ti ti-message-dots"></i> Fale conosco</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container footer-bottom-content">
                <span>©
                    <?php echo date('Y'); ?> NeedYou. Todos os direitos reservados.
                </span>
            </div>
        </div>
    </footer>
    <script>
        AOS.init();
    </script>
</body>

</html>