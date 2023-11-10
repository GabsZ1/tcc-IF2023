<div class="form-item">
    <span class="form-item-icon material-symbols-rounded">mail</span>
    <input type="email" name="email" placeholder="Seu e-mail" required>
</div>

<button type="submmit">verifica</button>

<script>

    function IsEmail(email){
    var exclude=/[^@-.w]|^[_@.-]|[._-]{2}|[@.]{2}|(@)[^@]*1/;
    var check=/@[w-]+./;
    var checkend=/.[a-zA-Z]{2,3}$/;
    if(((email.search(exclude) != -1)||(email.search(check)) == -1)||(email.search(checkend) == -1)){return false;}
    else {return true;}
    }
    
</script>