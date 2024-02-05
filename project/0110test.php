<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" charset="utf-8" />
        <title>留言給我們</title>
    </head>
<body>
    <form id="form1" name="form1" method="post" action="sendmail1.php">
    <fieldset>
    <legend>留言給我們</legend>
    <label>您的大名：</label>
    <input id="C_name" name="C_name" type="text" />
    <br />

    <label>您的Email：</label>
    <input id="C_email" name="C_email" type="text" />
    <br />

    <label>您的電話號碼：</label>
    <input id="C_tel" name="C_tel" type="text" />
    <br />

    <label>您的寶貴意見：</label>
    <textarea id="C_message" name="C_message"></textarea>
    <br />

    <input id="submit" name="submit" type="submit" value="確定送出" />
    </fieldset>
    </form>
</body>
</html>