<div class="pdf-header">
    <div class="text-center">
        <img src="var:myvariable" alt="">
    </div>
</div>
<div class="pdf-body">
    <!-- sailboat specifications -->
    <div class="spec">
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if(isset($name) && !empty($name)){?>
                        <th><?php _e('BOAT NAME','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $name ?></p>
                        </td>
                        <?php } ?>
                        <th></th>
                        <td class="empty"></td>
                        <th></th>
                        <td class="empty"></td>
                    </tr>
                </tbody>
            </table>

            <h4>Basic Measurements</h4>
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if(isset($loa) && !empty($loa)){?>
                        <th><?php _e('LOA','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $loa ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($lwl) && !empty($lwl)){?>
                        <th><?php _e('LWL','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $lwl ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($beam) && !empty($beam)){?>
                        <th><?php _e('BEAM','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $beam ?></p>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($disp) && !empty($disp)){?>
                        <th><?php _e('DISPLACEMENT','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $disp ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($sa) && !empty($sa)){?>
                        <th><?php _e('SAIL AREA','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $sa ?></p>
                        </td>
                        <?php } ?>
                        <th></th>
                        <td class="empty"></td>
                    </tr>
                </tbody>
            </table>

            <h4>Derived Quantities:</h4>
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if(isset($saDispRatio) && !empty($saDispRatio)){?>
                        <th><?php _e('SA/Disp','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $saDispRatio ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($balDispRatio) && !empty($balDispRatio)){?>
                        <th><?php _e('Bal/Disp','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $balDispRatio ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($dispLenRatio) && !empty($dispLenRatio)){?>
                        <th><?php _e('Disp/Len','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $dispLenRatio ?></p>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($comfortRatio) && !empty($comfortRatio)){?>
                        <th><?php _e('Comfort ratio','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $comfortRatio ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($capsizeRatio) && !empty($capsizeRatio)){?>
                        <th><?php _e('Capsize screening Formula','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $capsizeRatio ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($sNumber) && !empty($sNumber)){?>
                        <th><?php _e('S#','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $sNumber ?></p>
                        </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($hullSpeed) && !empty($hullSpeed)){?>
                        <th><?php _e('Hull speed','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $hullSpeed ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($immersion) && !empty($immersion)){?>
                        <th><?php _e('Pounds/Inch Immersion','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $immersion ?></p>
                        </td>
                        <?php } ?>
                        <th></th>
                        <td class="empty"></td>
                    </tr>
                </tbody>
            </table>

            <h4>RIG Measurements:</h4>
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if(isset($SAFore) && !empty($SAFore)){?>
                        <th><?php _e('SA Fore','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $SAFore ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($SAMain) && !empty($SAMain)){?>
                        <th><?php _e('SA Main','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $SAMain ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($SATotal) && !empty($SATotal)){?>
                        <th><?php _e('SA Total','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $SATotal ?></p>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if(isset($DisplCalc) && !empty($DisplCalc)){?>
                        <th><?php _e('SA/Disp (calculated)','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $DisplCalc ?></p>
                        </td>
                        <?php } ?>
                        <?php if(isset($estForestayLen) && !empty($estForestayLen)){?>
                        <th><?php _e('Est. Forestay length','sailboat') ?>:</th>
                        <td>
                            <p class="value"><?= $estForestayLen ?></p>
                        </td>
                        <?php } ?>
                        <th></th>
                        <td class="empty"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>