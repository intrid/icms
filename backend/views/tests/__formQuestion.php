<?php
//dd($model);
?>

<div class="row">
    <hr>
    <div class="pull-right" style="margin-top: -20px; cursor: pointer; color: red; margin-right: 10px" onclick="$(this).parent().remove()">Удалить</div>
    <div class="col-sm-8">
        <div class="form-group highlight-addon field-testform-question required">
            <label class="control-label has-star" for="testform-question">Вопрос</label>
            <input type="text" id="testform-question" class="form-control" name="Form[<?=$i?>][TestForm][question]" aria-required="true" value="<?= $model->question ?>">
        </div></div> 
    <div class="col-sm-4">
        <div class="form-group highlight-addon field-testform-question required">
            <label class="control-label has-star" for="testform-question">Тип вопросы</label>
            <select id="testform-typeQuestion" class="form-control" name="Form[<?=$i?>][TestForm][typeQuestion]" aria-required="true">
                <?php foreach ($model::getTypeQuestionStatic() as $key => $value): ?>
                    <option value="<?= $key ?>" <?= $model->typeQuestion == $key ? 'selected="selected"' : '' ?>><?= $value ?></option>
                <?php endforeach; ?>
            </select>
        </div></div>
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group highlight-addon field-testform-answer1 required">
                            <label class="control-label has-star" for="testform-answer1">Ответ №1</label>
                            <input type="text" id="testform-answer1" class="form-control" name="Form[<?=$i?>][TestForm][answer1]" aria-required="true" required="" value="<?= $model->answer1; ?>">
                        </div>              
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group highlight-addon field-testform-answercorrect1" style="padding-top: 20px;">
                            <div class="checkbox"><label class="has-star" for="testform-answercorrect1<?=$i?>">
                                    <input type="hidden" name="Form[<?=$i?>][TestForm][answerCorrect1]" value="0">
                                    <input type="checkbox" id="testform-answercorrect1<?=$i?>" <?= $model->answerCorrect1 == 1 ? 'checked="cheked"' : ''; ?> name="Form[<?=$i?>][TestForm][answerCorrect1]" value="1">
                                    Прав. ответ
                                </label>
                            </div>
                        </div>             
                    </div>    
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group highlight-addon field-testform-answer2 required">
                            <label class="control-label has-star" for="testform-answer2">Ответ №2</label>
                            <input type="text" id="testform-answer2" class="form-control" name="Form[<?=$i?>][TestForm][answer2]" aria-required="true" required="" value="<?= $model->answer2; ?>">
                        </div> 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group highlight-addon field-testform-answercorrect2"  style="padding-top: 20px;">
                            <div class="checkbox"><label class="has-star" for="testform-answercorrect2<?=$i?>">
                                    <input type="hidden" name="Form[<?=$i?>][TestForm][answerCorrect2]" value="0">
                                    <input type="checkbox" id="testform-answercorrect2<?=$i?>" <?= $model->answerCorrect2 == 1 ? 'checked="cheked"' : ''; ?> name="Form[<?=$i?>][TestForm][answerCorrect2]" value="1">
                                    Прав. ответ
                                </label>
                            </div>
                        </div>            
                    </div>    
                </div>
            </div>

            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group highlight-addon field-testform-answer3">
                            <label class="control-label has-star" for="testform-answer3<?=$i?>">Ответ №3</label>
                            <input type="text" id="testform-answer3" class="form-control" name="Form[<?=$i?>][TestForm][answer3]" value="<?= $model->answer3; ?>">
                        </div>                
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group highlight-addon field-testform-answercorrect3"  style="padding-top: 20px;">
                            <div class="checkbox"><label class="has-star" for="testform-answercorrect3<?=$i?>">
                                    <input type="hidden" name="Form[<?=$i?>][TestForm][answerCorrect3]" value="0">
                                    <input type="checkbox" id="testform-answercorrect3<?=$i?>" <?= $model->answerCorrect3 == 1 ? 'checked="cheked"' : ''; ?> name="Form[<?=$i?>][TestForm][answerCorrect3]" value="1">
                                    Прав. ответ
                                </label>
                            </div>
                        </div>                
                    </div>    
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group highlight-addon field-testform-answer4">
                            <label class="control-label has-star" for="testform-answer4">Ответ №4</label>
                            <input type="text" id="testform-answer4" class="form-control" name="Form[<?=$i?>][TestForm][answer4]" value="<?= $model->answer4; ?>">
                        </div>  
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group highlight-addon field-testform-answercorrect4">
                            <div class="checkbox"><label class="has-star" for="testform-answercorrect4<?=$i?>"  style="padding-top: 20px;">
                                    <input type="hidden" name="Form[<?=$i?>][TestForm][answerCorrect4]" value="0">
                                    <input type="checkbox" id="testform-answercorrect4<?=$i?>"  <?= $model->answerCorrect4 == 1 ? 'checked="cheked"' : ''; ?> name="Form[<?=$i?>][TestForm][answerCorrect4]" value="1">
                                    Прав. ответ
                                </label>
                            </div>
                        </div>            
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>



