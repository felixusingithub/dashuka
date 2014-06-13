<?php $this->load->view('header');?>
    <?php
        $TypeMap = array(
            'textbook' => '教材',
            'magazine' => '杂志',
            'journal' => '期刊',
            'other' => '其他'
        );
        $OldMap = array(
            '100' => '全新',
            '99' => '99成新',
            '90' => '9成新',
            '50' => '其他'
        );
    ?>
<div class="container">
    <div class="row" style="margin: 0 50px; padding: 40px 0">
        <?php 
            $row=$row[0];
            $imgurl = base_url('/images/bk.jpg');
            if (isset($row->imgurl)) {
                $imgurl = $row->imgurl;
            }
            $bkurl = base_url('/index.php/go/showbook/'.$row->bid);
            $succurl = base_url('/index.php/go/pay/');

            $authorArr = json_decode($row->authors);
            $authorStr = '';
            foreach ($authorArr as $key => $value) {
                $authorStr = $authorStr. $value . '&nbsp;';
            }

            $type = $TypeMap[$row->type];
            $old = $OldMap[$row->old];
            $detail = false;
            if (!isset($row->desc)){
                $desc='描述加载中...';
                $detail = true;
            }
        ?>
       
        <div class="row">
            <label for="contact" class="col-lg-3 control-label" style="text-align: right">书籍信息</label>
            <div class="col-lg-8">
                <p>[<?=$type?>]&nbsp;&nbsp;<i><?=$row->name?></i>&nbsp;&nbsp;
                <?=$authorStr?>&nbsp;著&nbsp;&nbsp;<?=$row->press?>&nbsp;&nbsp;版次:&nbsp;<?=$row->pubdate?>&nbsp;&nbsp;成色:&nbsp;<?=$old?></p>
            </div>
        </div>
        
        <hr>
        
        <form class="form-horizontal">

            <div class="form-group">
                <label for="contact" class="col-lg-3 control-label">手机号</label>
                <div class="col-lg-8">
                    <input type="text" class="form-control FormInputItem User" name="contact" id="contact">
                </div>
            </div>


            <div class="form-group">
                <label for="type" class="col-lg-3 control-label">交易地点</label>
                <div class="col-lg-8">
                    <select class="form-control FormInputItem User" name="place" id="place">
                        <option value="none">请选择</option>
                        <option value="52">52斋</option>
                        <!-- <option value="dh">大活</option> -->
                    </select>
                </div>
            </div>
        </form>
    </div>

    <div class="row" style="margin: 0 50px;">
        <center>
            <form action="<?=$succurl?>" method="post" id="totalInfoForm">
                <input type='hidden' id='YXM_here' />
                <input type='hidden' id="jsoninfo" name="jsoninfo"/>
                <br />
                <button type="button" id="YXM_submit_btn" disabled="disabled" class="btn btn-success">提交</button>
            </form>
        </center>
        <script type='text/javascript' charset='gbk' id='YXM_script' src='http://api.yinxiangma.com/api3/yzm.yinxiangma.php?pk=e890c698a353889605c123e923edf593&v=YinXiangMaJsSDK_4.0'></script>
        <script type='text/javascript'>
        function YXM_valided_true()
        {
            //验证码输入正确后的操作
            document.getElementById("YXM_submit_btn").disabled="";  
        }
        function YXM_valided_false()
        {
            //验证码输入错误后的操作
            document.getElementById("YXM_submit_btn").disabled="disabled";  
        }
        </script>
    </div>
</div>

<script>
function checkInputEmpty()
{
    var flag=true;
    $('.FormInputItem.User').each(function() {
        if ($(this).val()=="" || $(this).val()=="none") {
            $(this).parent().parent('.form-group').addClass('has-error');
            flag=false;
        }
    });
    
    if (flag) {
        return true;
    }
    else {
        alert('手机和地点不能为空');
        return false;
    } 
}

function checkInputFormat()
{
    var flag=true;
    var phone=$('#contact').val();
    var rule="(^1[3|4|5|8]\\d{9}$)|(^\\++\\d{2,}$)";
    if (phone.match(rule)==null) {
        flag=false;
        alert('手机号码格式错误');
    }
    if (!flag) {
        $('#contact').parent().parent('.form-group').addClass('has-error');
        return false;
    }
    return true;
}

function formInput2Json() {
    var userAttrCnt = $('.FormInputItem').size();
    var userInfo = '{"bid":' + "\"<?=$row->bid?>\",";
    var i = 1;
    
    $('.FormInputItem').each(function(){
        userInfo += '"' + $(this).attr('name') + '":"' + $(this).val() + '"';
        if (i == userAttrCnt) {
            userInfo += '}';
        }
        else {
            userInfo += ',';
        }
        i++;
    })
    return userInfo;
}

$(window).load(function(){
    $('.YXM-bg').css('width',parseFloat($('.YXM-content').css('width'))+22);
    $('.YXM-box').css('width',parseFloat($('.YXM-bg').css('width'))+8);
    $('.input-wrap').css('height',$('.sub-wrap .sub-btn').css('height'));
});

$(function(){
    $('#YXM_submit_btn').click(function(){
        if (!checkInputEmpty()) return false;
        if (!checkInputFormat()) return false;
        var info=formInput2Json();
        $('#jsoninfo').val(info);
        $('#totalInfoForm').submit();
    })
    
    $('.FormInputItem.User').focus(function() {
        $(this).parent().parent('.form-group').removeClass('has-error');
    });

    $('.FormInputItem.User').blur(function() {
        if ($(this).val()=="" || $(this).val()=="none") {
            $(this).parent().parent('.form-group').addClass('has-error');
            flag=false;
        }
    });
})
</script>
<?php $this->load->view('footer_empty'); ?>