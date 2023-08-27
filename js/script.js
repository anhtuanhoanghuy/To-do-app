const element = document.getElementById("todo-items");
let numb = element.children.length;
if (numb == 0) {
    document.getElementById("items-infor__left").innerHTML ="0 item left";
} else {
document.getElementById("items-infor__left").innerHTML = numb + " items left";
}

$('#all').click(function() {
        let a = $(".todo-item");
        a.show(600);
    })


$(document).ready(function() {
    $('#active').click(function() {
        let a = $(".todo-item__text--checked");
        a.parent().hide(600);
        let b = $(".todo-item__text");
        b.parent().show(600);
    })

    $('#completed').click(function() {
        let a = $(".todo-item__text");
        a.parent().hide(600);
        let b = $(".todo-item__text--checked");
        b.parent().show(600);
    })

    $(document).ready(function() {
    $('#clear').click(function() {
        $.post('app/clear.php', 
        {},
        (data) => {
            let a = $(".todo-item__text--checked");
            a.parent().hide(600);
        }
        );

    });
    });

    $('.close').click(function() {
        numb--;
        if (numb == 0) {
            document.getElementById("items-infor__left").innerHTML ="0 item left";
        } else {
            document.getElementById("items-infor__left").innerHTML = numb + " items left";
        }
        const id = $(this).attr('id');
        $.post('app/remove.php', 
        {
            id: id
        },
        (data) => {
            if (data) {
                $(this).parent().hide(600);
                setTimeout(() => {location.reload(); }, 1000);
            }
        }
        );
    }); 
    $('.check-mark').click(function(e) {
        const id = $(this).attr('data-todo-id');
       
        $.post('app/check.php', 
        {
            id: id
        },
        (data) => {
            if (data != 'error') {
                const h2 = $(this).parent();
                const h3 = h2.next();
                const h4 = h3.next();
                console.log(h4);

                if (data === 1) {
                    alert("checked");
                    h3.removeClass('todo-item__text');
                    h3.addClass('todo-item__text--checked');
                    h4.addClass('checked');
                    $(this).addClass('checked');
                    location.reload();  
                } else {
                    h3.removeClass('todo-item__text--checked');
                    h3.addClass('todo-item__text');
                    h4.removeClass('checked');
                    $(this).removeClass('checked');
                    location.reload()                           
                }
                
            }                                    
            
        }
        );
    })
});