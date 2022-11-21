<?php

require_once('classes/Message.php');

$do = isset($_REQUEST["do"]) ? $_REQUEST["do"] : null;

$m = new Message();
switch ($do) {
    case 'create':
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
            $m->create($_POST["name"], $_POST["email"], $_POST["message"]);
        }
        break;
    case 'update':
        $m->update($_POST['id'], $_POST['message']);
        break;
    case 'delete':
        $m->delete($_POST['id']);
        break;
    default:
        break;
}
$m->read();


?>
<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        border: none;
    }
    form, div {
        display: flex;
        flex-direction: row;
    }

</style>

<form method="POST">
    <input type="hidden" name="do" value="create"/>
    <input type="text" name="name" placeholder="Name..."/>
    <input type="text" name="email" placeholder="Email..."/>
    <input type="text" name="message" placeholder="Bericht..."/>
    <button>submit</button>
</form>
