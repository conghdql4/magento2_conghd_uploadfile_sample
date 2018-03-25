# Important Note
Do lần đầu tiên tạo module e không thiết lập InstallSchema.php <br>
Nên khi install module thì nó sẽ không tự đông Create table 'file_status' <br>
Sau đó em thêm vào mà vẫn không thể tự động tạo được

 # Vậy, Trong trường hợp khi install module mà không tự động tạo thì a hãy sử dụng DDL để tạo bằng tay table 'file_status'
 Tham khảo file Create_Table_file_status.sql ở thư mục gốc hoạc sử dụng SQL query dưới đây :
 SQL : 
 
CREATE TABLE file_status (
      file_id int(11) NOT NULL auto_increment,
      file_name varchar(100) ,
      file_status int(11) ,
      file_size int(11) ,
      user_name varchar(30) ,
      store_name varchar(50) ,
      ip_address varchar(30) ,
      browser varchar(100) ,
      date_uploaded timestamp ,
      date_updated timestamp,primary key(file_id) );

Thanks and Best regards, <br>
CongHD
