<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script type="text/javascript" charset="utf-8" src="<?php echo C('JS_URL');?>jquery-1.8.3.min.js"></script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <style type="text/css">
        <!--
        body {
            margin-left: 3px;
            margin-top: 0px;
            margin-right: 3px;
            margin-bottom: 0px;
        }
        .STYLE1 {
            color: #e1e2e3;
            font-size: 12px;
        }
        .STYLE6 {color: #000000; font-size: 12; }
        .STYLE10 {color: #000000; font-size: 12px; }
        .STYLE19 {
            color: #344b50;
            font-size: 12px;
        }
        .STYLE21 {
            font-size: 12px;
            color: #3b6375;
        }
        .STYLE22 {
            font-size: 12px;
            color: #295568;
        }
        a:link{
            color:#e1e2e3; text-decoration:none;
        }
        a:visited{
            color:#e1e2e3; text-decoration:none;
        }
        -->
    </style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td height="24" bgcolor="#353c44"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="6%" height="19" valign="bottom"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>tb.gif" width="14" height="14" /></div></td>
                                <td width="94%" valign="bottom"><span class="STYLE1"> <?php echo ($daohang["first"]); ?> -> <?php echo ($daohang["second"]); ?></span></td>
                            </tr>
                        </table></td>
                        <td><div align="right"><span class="STYLE1">
              <a href="<?php echo ($daohang["url"]); ?>"><img src="<?php echo C('AD_IMG_URL');?>add.gif" width="10" height="10" /> <?php echo ($daohang["third"]); ?></a>   &nbsp;
              </span>
                            <span class="STYLE1"> &nbsp;</span></div></td>
                    </tr>
                </table></td>
            </tr>
        </table></td>
    </tr>

<tr>
    <td><table id="attr_cont" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#a8c7ce">
        <tr>
            <td colspan="100">
                <input type="hidden" id="type_id" value="<?php echo ($_GET['type_id']); ?>">
                <script>
                    $(function () {
                        //页面加载好后，就把传递过来的类型设置为选取的类型
                        var chuan_type_id = $('#type_id').val();
                        $('#goods_type_id').val([chuan_type_id]);
                        show_attr_info();//根据下拉列表选取的项目，获得对应的属性列表显示
                    })
                    //根据选取的“类型”，展示对应的属性列表信息
                    function show_attr_info(){
                        var g_type_id = $('#goods_type_id').val();
                        $.ajax({
                           url:'/index.php/Admin/Attribute/getInfoByType',
                            data:{'type_id':g_type_id},
                            dataType:'html',
                            type:'get',
                            success:function (msg) {
                                $('#attr_cont tr:gt(1)').remove();
                                $('#attr_cont').append(msg);
                            }
                        });
                    }
                </script>
                <span style="color: #3b4249;font-size: 12px">按商品类型显示</span>
                <select id="goods_type_id" onchange="show_attr_info()">
                    <option value="0">-请选择-</option>
                    <?php if(is_array($typeinfo)): foreach($typeinfo as $key=>$v): ?><option value="<?php echo ($v["type_id"]); ?>"><?php echo ($v["type_name"]); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td width="4%" height="20" bgcolor="d3eaef" class="STYLE10"><div align="center">
                <input type="checkbox" name="checkbox" id="checkbox" />
            </div></td>
            <td width="7%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">序号</span></div></td>
            <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">属性名称</span></div></td>
            <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">类型名称</span></div></td>
            <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">单选多选</span></div></td>
            <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">录入方式</span></div></td>
            <td width="8%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">可选值</span></div></td>

            <td width="14%" height="20" bgcolor="d3eaef" class="STYLE6"><div align="center"><span class="STYLE10">基本操作</span></div></td>
        </tr>

        <?php if(is_array($infoattr)): $i = 0; $__LIST__ = $infoattr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$attr): $mod = ($i % 2 );++$i;?><tr>
                <td height="20" bgcolor="#FFFFFF"><div align="center">
                    <input type="checkbox" name="checkbox3" id="checkbox3" />
                </div></td>
                <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($attr["attr_id"]); ?></div></td>
                <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($attr["attr_name"]); ?></div></td>
                <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($attr["type_name"]); ?></div></td>
                <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($attr['attr_sel']=='0'?'单选':'多选'); ?></div></td>
                <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($attr['attr_write']=='0'?'手工录入':'列表选取'); ?></div></td>
                <td height="20" bgcolor="#FFFFFF" class="STYLE19"><div align="center"><?php echo ($attr["attr_vals"]); ?></div></td>


                <td height="20" bgcolor="#FFFFFF"><div align="center"><span class="STYLE21">
<a href="<?php echo U('Attribute/edit', array('type_id'=>$type['type_id']));?>" style="color: #3f9aff"><img src="<?php echo C('AD_IMG_URL');?>edit.gif" width="10" height="10" />修改</a>
        <img src="<?php echo C('AD_IMG_URL');?>del.gif" width="10" height="10" /> 删除 | 查看 </span></div></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table></td>
</tr>
<tr>
    <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="33%"><div align="left"><span class="STYLE22">&nbsp;&nbsp;&nbsp;&nbsp;共有<strong> 243</strong> 条记录，当前第<strong> 1</strong> 页，共 <strong>10</strong> 页</span></div></td>
            <td width="67%"><table width="312" border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_54.gif" width="40" height="15" /></div></td>
                    <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_56.gif" width="45" height="15" /></div></td>
                    <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_58.gif" width="45" height="15" /></div></td>
                    <td width="49"><div align="center"><img src="<?php echo C('AD_IMG_URL');?>main_60.gif" width="40" height="15" /></div></td>
                    <td width="37" class="STYLE22"><div align="center">转到</div></td>
                    <td width="22"><div align="center">
                        <input type="text" name="textfield" id="textfield"  style="width:20px; height:12px; font-size:12px; border:solid 1px #7aaebd;"/>
                    </div></td>
                    <td width="22" class="STYLE22"><div align="center">页</div></td>
                    <td width="35"><img src="<?php echo C('AD_IMG_URL');?>main_62.gif" width="26" height="15" /></td>
                </tr>
            </table></td>
        </tr>
    </table></td>
</tr>
</table>

</body>
</html>