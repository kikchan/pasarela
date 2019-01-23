<style> 
input[type=text] {
    vertical-align: middle;
    height: 38px;
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #00B4CC;
    border-radius: 4px;
    font-size: 13px;
    background-color: white;
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px;
    -webkit-transition: width 0.5s ease-in-out;
    transition: width 0.5s ease-in-out;
}
input[type=text]:focus {
    width: 30%;
}
.searchButton {
    vertical-align: middle;
    border: 1px solid #00B4CC;
    background: #00B4CC;
    text-align: center;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;
    font-size: 24px;
}
</style>
<input type="text" id="search" name="search" value="{{isset($_GET['search']) ? $_GET['search'] : ''}}" placeholder="Buscar...">
<button type="submit" class="searchButton">
    <i class="fa fa-search"></i>
</button>