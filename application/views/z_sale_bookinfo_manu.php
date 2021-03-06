
<form id="manuForm" class="form-horizontal">
    
    <div class="form-group">
        <label for="name" class="col-lg-3 control-label">ISBN</label>
        <div class="col-lg-8">
            <input type="text" placeholder="ISBN" class="form-control FormInputItem" name="isbn" id="isbn">
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-lg-3 control-label">书名</label>
        <div class="col-lg-8">
            <input type="text" placeholder="书名" class="form-control qf_name FormInputItem" name="name">
        </div>
    </div>
    
    <div class="form-group">
        <label for="authors" class="col-lg-3 control-label">作者</label>
        <div class="col-lg-8">
            <input type="text" placeholder="作者" class="form-control qf_author FormInputItem" name="authors">
        </div>
    </div>
    
    <div class="form-group">
        <label for="press" class="col-lg-3 control-label">版本</label>
        <div class="col-lg-8">
            <input type="text" placeholder="版本" class="form-control qf_pub FormInputItem" name="pubdate">
        </div>
    </div>
    
    <div class="form-group">
        <label for="press" class="col-lg-3 control-label">出版社</label>
        <div class="col-lg-8">
            <input type="text" placeholder="出版社" class="form-control qf_press FormInputItem" name="press">
        </div>
    </div>
    
    <div class="form-group">
        <label for="type" class="col-lg-3 control-label">类型</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem" name="type" id="type">
                <option value="none">请选择</option>
                <option value="textbook">教材</option>
                <option value="magazine">杂志</option>
                <option value="journal">期刊</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="old" class="col-lg-3 control-label">成色</label>
        <div class="col-lg-8">
            <select class="form-control FormInputItem" name="old" id="old">
                <option value="none">请选择</option>
                <option value="100">全新</option>
                <option value="99">99成新</option>
                <option value="90">9成新</option>
                <option value="50">其他</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="price" class="col-lg-3 control-label">价格</label>
        <div class="col-lg-8">
            <input type="text" placeholder="价格" class="form-control FormInputItem" name="price" id="price">
        </div>
    </div>
    
    <input type="text" class="form-control qf_imgurl FormInputItem" name="imgurl" id="imgurl" style="display:none">

</form>
