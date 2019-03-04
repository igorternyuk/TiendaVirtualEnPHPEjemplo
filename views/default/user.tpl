{* User page*}

<h2>Ваши регистрационные данные</h2>

<div id="userData">
<table border="0">
    <tr>
        <td>Логин:</td>
        <td><input type="email" id="login" name="newEmail" readonly value="{$activeUser['email']}" /></td>
    </tr>
    <tr>
        <td>Имя:</td>
        <td><input type="text" id="newName" name="newName" value="{$activeUser['name']}" /></td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td><input type="text" id="newPhone" name="newPhone" value="{$activeUser['phone']}" /></td>
    </tr>
    <tr>
        <td>Адрес:</td>
        <td><textarea id="newAddress" name="newAddress"/>{$activeUser['address']}</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль:</td>
        <td><input type="password" name="newPwd1" id="newPwd1" value="" /></td>
    </tr>
    <tr>
        <td>Повтор пароля:</td>
        <td><input type="password" name="newPwd2" id="newPwd2" value="" /></td>
    </tr>
    <tr>
        <td>Текущий пароль:</td>
        <td><input type="password" name="currPwd" id="currPwd" value="" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" id="btnUpdateUserData" name="btnUpdateUserData" value="Сохранить изменения" onclick="updateUserData();"></td>
    </tr>
</table>    
</div>
