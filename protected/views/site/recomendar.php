<div style="width:400px;" id="contenedor_form">
    <div class="tit_form">
        Recomienda tu plan <span>POR CORREO</span>
    </div>
    <div style="line-height:20px;" class="text_incluye style1">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Los datos con asterisco (<span class="asterisco">*</span>) son obligatorios
    </div>
    <div style="display:none;" class="alert alert-block alert-error text_incluye style2">

    </div>
    <div style="height:20px; display:block;"></div>
    <form name="frm" action="<?php echo Yii::app()->createUrl('site/recomendar',array('id'=>$id)); ?>" method="POST">
        <div class="row">
            <div align="right" style="width:48%; float:left;" class="text_incluye style1" height="30">
                <label for="Reservas_nombre" style="line-height:30px; margin-right:10px;" align="right" class="text_incluye style1">Tu Nombre</label>                </div>
            <div align="left" style="width:2%; float:right; display:inline-block;" class="text_incluye style1" height="30">
                <span class="asterisco">*</span>
            </div>
            <div align="left" style="width:50%; float:right;" class="text_incluye style1" height="30">
                <input type="text" align="right" id="Recomendar_nombreS" name="Recomendar[nombreS]" style="line-height:30px; height:30px; width:95%; margin-bottom:1px;" class="text_incluye style1" maxlength="100" size="60">                </div>

        </div>
        <div class="row">
            <div align="right" style="width:48%; float:left;" class="text_incluye style1" height="30">
                <label for="Reservas_nombre" style="line-height:30px; margin-right:10px;" align="right" class="text_incluye style1">Tu E-Mail</label>                </div>
            <div align="left" style="width:2%; float:right; display:inline-block;" class="text_incluye style1" height="30">
                <span class="asterisco">*</span>
            </div>
            <div align="left" style="width:50%; float:right;" class="text_incluye style1" height="30">
                <input type="text" align="right" id="Recomendar_mailS" name="Recomendar[mailS]" style="line-height:30px; height:30px; width:95%; margin-bottom:1px;" class="text_incluye style1" maxlength="100" size="60">                </div>

        </div>
        <div class="row">
            <div align="right" style="width:48%; float:left;" class="text_incluye style1" height="30">
                <label for="Reservas_nombre" style="line-height:30px; margin-right:10px;" align="right" class="text_incluye style1">Nombre Destinatario</label>                </div>
            <div align="left" style="width:2%; float:right; display:inline-block;" class="text_incluye style1" height="30">
                <span class="asterisco">*</span>
            </div>
            <div align="left" style="width:50%; float:right;" class="text_incluye style1" height="30">
                <input type="text" align="right" id="Recomendar_NombreD" name="Recomendar[nombreD]" style="line-height:30px; height:30px; width:95%; margin-bottom:1px;" class="text_incluye style1" maxlength="100" size="60">                </div>

        </div>
        <div class="row">
            <div align="right" style="width:48%; float:left;" class="text_incluye style1" height="30">
                <label for="Reservas_nombre" style="line-height:30px; margin-right:10px;" align="right" class="text_incluye style1">E-Mail Destinatario</label>                </div>
            <div align="left" style="width:2%; float:right; display:inline-block;" class="text_incluye style1" height="30">
                <span class="asterisco">*</span>
            </div>
            <div align="left" style="width:50%; float:right;" class="text_incluye style1" height="30">
                <input type="text" align="right" id="Recomendar_mailD" name="Recomendar[mailD]" style="line-height:30px; height:30px; width:95%; margin-bottom:1px;" class="text_incluye style1" maxlength="100" size="60">                </div>

        </div>
        <div class="row">
            <div align="right" style="width:48%; float:left;" class="text_incluye style1" height="30">
                <label for="Reservas_nombre" style="line-height:30px; margin-right:10px;" align="right" class="text_incluye style1">Comentarios</label>                </div>
            <div align="left" style="width:2%; float:right; display:inline-block;" class="text_incluye style1" height="30">
                <span class="asterisco">*</span>
            </div>
            <div align="left" style="width:50%; float:right;" class="text_incluye style1" height="30">
                <textarea id="Recomendar_msg" class="text_incluye style1" align="right" style="line-height: 30px; height: 130px; width: 199px; margin-bottom: 1px;" name="Recomendar[msg]"></textarea>                </div>

        </div>
        <div style="margin-left:20px;" class="row buttons">
            <input type="submit" value="" name="yt1" id="bot_button" class="bot_enviar" style="width:98px;">
        </div>
    </form>
</div>