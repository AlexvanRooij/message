<?php
class Message {

    public function __construct()
    {
        // empty
    }
    public function read(): bool {
        $sql = "SELECT * FROM message";
        $mysqli = new mysqli('localhost', 'root', 'root', 'keukenboer');
        $stmt = $mysqli->prepare($sql);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_object()) {
                echo "
                <div>
                    <form method='POST' name='do'>
                        <input type='hidden' name='do' value='delete'/>
                        <input type='hidden' name='id' value='$row->idmessage'/>
                        <button>DELETE</button>
                    </form> 
                    ({$row->email}): 
                        <form method='post'>
                            <input type='hidden' name='id' value='$row->idmessage'/>
                            <input type='hidden' name='do' value='update'/>
                            <input type='text' name='message' value='$row->message'/>
                        </form>
                    </div><br>";
            }
            return true;
        }
        return false;
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM message WHERE idmessage = $id";
        $mysqli = new mysqli('localhost', 'root', 'root', 'keukenboer');
        $stmt = $mysqli->prepare($sql);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function create(string $name, string $email, string $message): bool {
        $sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";
        $mysqli = new mysqli('localhost', 'root', 'root', 'keukenboer');
        $stmt = $mysqli->prepare($sql);
        if ($stmt->execute()) {
            return true;

        }
        return false;
    }

    public function update(int $idmessage, string $message): bool {
        $sql = "UPDATE message SET message = '$message' WHERE idmessage = '$idmessage'";
        $mysqli = new mysqli('localhost', 'root', 'root', 'keukenboer');
        $stmt = $mysqli->prepare($sql);
        if ($stmt->execute()) {
            return true;

        }
        return false;
    }
}
?>