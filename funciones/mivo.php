<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>MIVO</title>
</head>

<body>
<df-messenger
  project-id="mivo-404415"
  agent-id="334e87c5-bf10-4939-b588-1cb51d9616a3"
  language-code="es"
  intent="Welcome">
  <df-messenger-chat-bubble
   chat-title="MIVO"
   chat-subtitle="Tu asistente virtual"
   placeholder-text="Preguntale a mivo"
   chat-icon=""
   chat-title-icon="https://cdn-icons-png.flaticon.com/256/6549/6549177.png"
   storage-option="none"
   bot-writing-image="https://cdn-icons-png.flaticon.com/256/6549/6549177.png">
  </df-messenger-chat-bubble>
</df-messenger>
<style>
  df-messenger {
    z-index: 999;
    position: fixed;
    bottom: 16px;
    right: 16px;
    --df-messenger-primary-color:black;
    --df-messenger-font-color: black;
    --df-messenger-focus-color: rgb(124, 189, 124);
    --df-messenger-font-family:"Google Sans";
    --df-messenger-font-size:16px;
    --df-messenger-chat-border:gray;
    --df-messenger-chat-window-height:460px;
    --df-messenger-chat-window-box-shadow:green;
    --df-messenger-message-user-background:darkgray;
    --df-messenger-chat-bubble-size: 64px;
    --df-messenger-chat-background:rgba(128, 128, 128, 0.521);
  }
</style>
</body>
</html>