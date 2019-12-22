// function update(){
//     var filePath = $(this).val();         //获取到input的value，里面是文件的路径
//     console.log(filePath); 
//         // fileFormat = filePath.substring(filePath.lastIndexOf(".")).toLowerCase(),
//         // src = window.URL.createObjectURL(this.files[0]); //转成可以在本地预览的格式
//     // 检查是否是图片
//     if( !fileFormat.match(/.png|.jpg|.jpeg/) ) {
//         error_prompt_alert('上传错误,文件格式必须为：png/jpg/jpeg');
//         return;  
//     }

//     $('#cropedBigImg').attr('src',src);
// };

function readURL(input) {
    console.log("AAAA");
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
