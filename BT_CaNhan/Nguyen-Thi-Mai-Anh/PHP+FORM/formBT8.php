<!DOCTYPE html>
<html lang="en">

<head>
  <title>Thông tin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <form action="configBT8.php" method="POST">
    <fieldset>
      <legend>Nhập thông tin:</legend>
      <table>
        <tr>
          <td>Họ tên:</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>Địa chỉ:</td>
          <td><input type="text" name="address"></td>
        </tr>
        <tr>
          <td>Số điện thoại:</td>
          <td><input type="text" name="telephone"></td>
        </tr>
        <tr>
          <td>Giới tính:</td>
          <td>
            <input type="radio" name="gender" value="Nam"/>Nam
            <input type="radio" name="gender" value="Nữ" />Nữ
          </td>
        </tr>
        <tr>
          <td>Quốc tịch:</td>
          <td>
            <select name="nationality">
              <option value="Việt Nam">
                Việt Nam
              </option>
              <option value="Hàn Quốc">
                Hàn Quốc
              </option>
              <option value="Nhật Bản">
                Nhật Bản
              </option>
            </select>
          </td>
        </tr>
        <tr>
          <td><label>Các môn đã học:</label></td>
          <td>
            <input type="checkbox" name="sub1" value="PHP & MySQL"/>PHP & MySQL
            <input type="checkbox" name="sub2" value="C#"/>C#
            <input type="checkbox" name="sub3" value="XML"/>XML
            <input type="checkbox" name="sub4" value="Python"/>Python
          </td>
        </tr>
        <tr>
          <td><label>Ghi chú:</label></td>
          <td><textarea name="note" rows="5" cols="40"></textarea></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Gửi"> <input type="reset" value="Hủy"></td>
        </tr>
      </table>
    </fieldset>
  </form>
</body>

</html>