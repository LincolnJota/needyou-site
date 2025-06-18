<?php
$nome = htmlspecialchars($_POST['nome'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$mensagem = htmlspecialchars($_POST['mensagem'] ?? '');

if ($nome && $email && $mensagem) {
    // Simulação: substitua por mail() ou integração SMTP real em produção
    // mail("contato@needyou.com.br", "Contato de Instituição de Ensino - NeedYou", $body, $headers);
    $feedback = "Mensagem enviada com sucesso! Em breve nossa equipe entrará em contato.";
} else {
    $feedback = "Por favor, preencha todos os campos.";
}
