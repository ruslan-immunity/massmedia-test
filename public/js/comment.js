
$(document).ready(function(){

    $('#sendComment').click((e) => {
        e.preventDefault();

        $.ajax({
            type:'POST',
            url:'/comment',
            data: {
                _token: $('meta[name="csrf-token"]')[0].content,
                post_id: $('textarea[name="comment"]').attr('id'),
                comment: $('textarea[name="comment"]').val(),
                author: $('input[name="author"]').val()
            },
    
            success:function(msg) {
                if (msg) {
                    //console.log(msg);
                    let products = `<div class="p-2 mb-2 bg-secondary text-white col-6">
                                        <p>`+ msg['comment'].created_at + `<br>Автор: ` + msg['author'] +`</p>
                                        <p>`+ msg['comment'].content +`</p>
                                    </div>`;
                    $('#list_comments').append(products);
                }
    
            }
        });
    });
});