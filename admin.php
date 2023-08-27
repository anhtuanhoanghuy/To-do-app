<?php require 'db_connection.php';
    session_start();
    if(!isset($_SESSION['username'])) {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List App</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <a href = "logout.php" id = "logout">Logout
    </a>
    <div class="background-image">
        <img src="./assets/img_slider/ảnh-bầu-trời-đêm.jpg">
    </div>
    <div class="container">
        <div class="header">
            <div class="header__title">
                TODO
            </div>
        </div>

        <div class="new-todo"> 
            <div class="new-todo__input">
                <form method = "POST" autocomplete="off" action="app/add.php">
                    <input id="todo-input" type="text" placeholder="Create a new todo..."  name="title"/>
                </form>
            </div>
        </div>

        <div class="todo-items-wrapper">
            <div class="todo-items" id ="todo-items">
              
                <?php $current_username = $_SESSION['username']; 
                $todos = $conn->query("SELECT * FROM $current_username ORDER BY id DESC");?>
                <?php while ($todo = $todos -> fetch(PDO::FETCH_ASSOC)) { ?>
                    <div class="todo-item">
                        <?php if (!$todo['checked']) { ?>
                            <div class="check">
                                <div class="check-mark"
                                     data-todo-id = "<?php echo $todo['id']; ?>">
                                </div>
                            </div>                     
                            <div class="todo-item__text"><?php echo $todo['title'] ?> </div>
                            <div class="datetime">created: <?php echo $todo['date_time'] ?> </div>
                            <div class="close" id= "<?php echo $todo['id']; ?>"> 
                                <i  class="fa-sharp fa-solid fa-xmark fa-lg"></i>
                            </div>
                        <?php }else { ?>
                            <div class="check">
                                <div class="check-mark checked"
                                     data-todo-id = "<?php echo $todo['id']; ?>">
                                    
                                <img src="./assets/img_slider/icons8-checkmark.svg">
                                </div>
                            </div>
                            <div class="todo-item__text--checked"><?php echo $todo['title'] ?> </div>
                            <div class="datetime checked">created: <?php echo $todo['date_time'] ?> </div>
                            <div class="close" id= "<?php echo $todo['id']; ?>"><i  class="fa-sharp fa-solid fa-xmark fa-lg"></i></div>
                            <?php } ?>
                    </div>
                <?php } ?>
            </div>
            
                
                
        </div>

            <div class="todo-items-info">
                <div class="items-infor__left" id = "items-infor__left" >
                </div>
                <div class="items-infor__statuses">
                    <span id ="all">All</span>
                    <span id = 'active'>Active</span>
                    <span id = 'completed'>Completed</span>
                </div>
                <div class="items-infor__clear">
                    <span id = 'clear'>Clear Completed</span>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
