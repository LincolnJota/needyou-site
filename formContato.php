<?php
$nome = htmlspecialchars($_POST['nome'] ?? '');
$email = htmlspecialchars($_POST['email'] ?? '');
$instituicao = htmlspecialchars($_POST['instituicao'] ?? '');
$code = htmlspecialchars($_POST['code'] ?? 'Não Informado');
$ip = $_SERVER['REMOTE_ADDR'] ?? '';

if (!$nome || !$email || !$instituicao) {
    $feedback = "Por favor, preencha todos os campos.";
    return;
}

/* -----------------------------------------
 * CONFIGURAÇÕES
 * ----------------------------------------*/
$to       = 'contato@needyou.com.br';
$subject  = "📥 Novo contato de Instituição – $instituicao";
$logoURL  = 'https://needyou.com.br/assets/needyou-mail.png';
$siteURL  = 'https://needyou.com.br';
$corMain  = '#feca17';      // amarelo NeedYou
$corDark  = '#1a1a1a';

/* -----------------------------------------
 * MONTA HTML INLINE (compatível com Gmail, Outlook…)
 * ----------------------------------------*/
$data = date('d/m/Y H:i:s');

$body = "
<!DOCTYPE html>
<html lang=\"pt-br\">
<head>
<meta charset=\"UTF-8\">
<title>NeedYou – Novo Contato</title>
<style>
    body   { margin:0; padding:0; background:#f5f5f5; font-family:'Poppins', Arial, sans-serif; color:#333; }
    h2     { margin:0 0 12px 0; font-size:22px; color:{$corDark}; }
    table  { border-collapse:collapse; width:100%; max-width:600px; margin:20px auto; }
    td     { padding:8px 12px; border:1px solid #ddd; }
    tr:nth-child(even) { background-color:#f9f9f9; }
    .wrapper { background:#ffffff; border-radius:8px; overflow:hidden; }
    .header  { background:{$corMain}; padding:24px; text-align:center; }
</style>
</head>
<body>
  <table class=\"wrapper\" role=\"presentation\">
    <!-- Cabeçalho -->
    <tr>
      <td class=\"header\">
        <img src=\"{$logoURL}\" alt=\"NeedYou\" width=\"140\" style=\"display:block;border:0;\">
      </td>
    </tr>

    <!-- Conteúdo -->
    <tr>
      <td style=\"padding:32px 40px;\">
        <h2>📥 Novo lead de Instituição de Ensino</h2>
        <p style=\"margin:0 0 24px 0;font-size:16px;line-height:1.5;\">
          Você recebeu um novo contato via formulário do site.<br>
          <strong>Confira os detalhes abaixo:</strong>
        </p>

        <table role=\"presentation\">
          <tr><td><strong>Nome:</strong></td><td>{$nome}</td></tr>
          <tr><td><strong>E‑mail:</strong></td><td>{$email}</td></tr>
          <tr><td><strong>Instituição:</strong></td><td>{$instituicao}</td></tr>
          <tr><td><strong>Recebido em:</strong></td><td>{$data}</td></tr>
          <tr><td><strong>IP:</strong></td><td>{$ip}</td></tr>
            <tr><td><strong>Código:</strong></td><td>{$code}</td></tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
";

/* -----------------------------------------
 * HEADERS
 * ----------------------------------------*/
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: NeedYou <no-reply@needyou.com.br>\r\n";
$headers .= "Reply-To: $email\r\n";

/* -----------------------------------------
 * ENVIO
 * ----------------------------------------*/
if (mail($to, $subject, $body, $headers)) {
    $feedback = "Mensagem enviada com sucesso! Em breve nossa equipe entrará em contato.";
} else {
    $feedback = "Houve um problema ao enviar seu contato. Tente novamente.";
}
