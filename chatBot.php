<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;1,300&display=swap" rel="stylesheet">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <link rel="stylesheet" href="static/css/chat.css">
    <link rel="stylesheet" href="static/css/chatBot.css">
    <link rel="stylesheet" href="static/css/typing.css">
    <title>Chatbox</title>
</head>
<body>
    
    <div class="container">
    -->
    
        <div class="chatbox">
            <div class="chatbox__support">
                <div class="chatbox__header">
                    <div class="chatbox__image--header">
                        <img src="static/images/image.png" alt="image">
                    </div>
                    <div class="chatbox__content--header">
                        <h4 class="chatbox__heading--header">Soporte Angelina Atelier</h4>
                        <p class="chatbox__description--header">¡Hola! Estoy aquí para ayudarte en cualquier duda que tengas.</p>
                    </div>
                </div>
                <div class="chatbox__messages" id="chatbox__messages">
                    <div>
                        <!--
                        <div class="messages__item messages__item--visitor">
                            Can you let me talk to the support?
                        </div>
                        <div class="messages__item messages__item--operator">
                            Sure!
                        </div>
                        <div class="messages__item messages__item--visitor">
                            Need your help, I need a developer in my site.
                        </div>
                        <div class="messages__item messages__item--operator">
                            Hi... What is it? I'm a front-end developer, yay!
                        </div>
                        <div class="messages__item messages__item--typing">
                            <span class="messages__dot"></span>
                            <span class="messages__dot"></span>
                            <span class="messages__dot"></span>
                        </div>
                        -->
                    </div>
                </div>
                <div class="chatbox__footer">
                    <!--<img src="static/images/icons/emojis.svg" alt="">-->
                    <!--<img src="static/images/icons/microphone.svg" alt="">-->
                    <!--<p class="chatbox__send--footer">Send</p>-->
                    
                    <form class="chat" method="post" autocomplete="off">
                        <input type="text" placeholder="Preguntale algo a Angelina..." name="chat" id="chat" maxlength="40">
                        <input type="submit" value="Enviar" id="btn" class="chatbox__send--footer">
                    </form>
                    
                    <!--<img src="static/images/icons/attachment.svg" alt="">-->
                </div>
            </div>
            <div class="chatbox__button">
                <button>button</button>
            </div>
        </div>
    
    <!--
    </div>
    
    
    <script src="static/js/Chat.js"></script>
    <script src="static/js/chatBot.js"></script>
</body>
</html>
    -->