<?php
include_once'Application/views/head.php';
$itemID = $_GET['value'];
?>
<head>
</head>
<center><h1>Đưa mặt hàng vào phiên đấu giá</h1>
    <form name="clock" action="index.php?control=setAuction&value=<?php echo $itemID; ?>" method="post">

        <table>
            <tr> 
                <td>Loại Vật Phẩm</td><td><input type="text" name="type"></td>
            </tr>
            <tr>
                <td>Giá Thấp Nhất</td><td><input type="text" name="minprice"></td>
            </tr>
            <tr> 
                <td>Thời gian Bắt đầu</td><td><input type="text" readonly="true" name="startdate" value=""></td>
            </tr>
            <tr> 
                <td>Thời gian Kết Thúc</td><td><input type="text" name="enddate"></td>
            </tr>
            <tr>
                <td>Pass Item</td><td><input type="password" name="passwd"></td>
            </tr> 
            <tr>
                <td></td>
                <td><input type="submit" name="setAuction" value="setAuction"></td>
            </tr>
        </table>      
    </form>
    <script>
        function clock(){
            //Khởi tạo đối tượng timer sử dụng Date Object
            var timer = new Date();
            //Gọi các phương thức của đối tượng timer
            var year = timer.getFullYear();
            var month = timer.getMonth()+1;
            var day = timer.getDate();
            var hour = timer.getHours();  //Lấy giờ hiện tại (giá trị từ 0 - 23)
            var minute = timer.getMinutes();  //Lấy phút hiện tại
            var second = timer.getSeconds();  //Lấy giây  hiện tại
            //Thêm ký tự 0 đằng trước nếu giờ, phút, giây < 10 với câu lệnh điều khiển if
            if(day < 10){day = "0" + day;}
            if(month <10){month ="0" +month}
            if(hour < 10) {hour = "0" + hour;}
            if(minute < 10) {minute = "0" + minute;}
            if(second < 10) {second = "0" + second;}
            //Hiện thị thời gian lên thẻ div id="clock" với phương thức innerHTML
            document.clock.startdate.value = year + "-" + month + "-" +day + " " + hour + ":" + minute + ":" + second;
        }
        //Thực hiện hàm clock theo chu kỳ 1 giây
        setInterval("clock()",1000);
    </script>
</center>
<?php
include_once'Application/views/footer.php';
?>
