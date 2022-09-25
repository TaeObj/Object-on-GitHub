<div class="pdf-header">
    <div class="text-center">
        <img src="var:myvariable" alt="">
    </div>
</div>
<div class="pdf-body">
    <!-- sailboat specifications -->
    <div class="spec">
        <h4><?php _e('Sailboat Specifications','sailboat') ?></h4>
        <div class="spec-bord">
            <table class="table">
                <tbody class="table-light">
                    <tr>
                        <?php if(isset($name) && !empty($name)){?>
                        <th colspan="2"><?php _e('BOAT NAME','sailboat') ?>:</th>
                        <td colspan="2"><?= $name ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($loa) && !empty($loa)){?>
                        <th colspan="2"><?php _e('LOA','sailboat') ?>:</th>
                        <td colspan="2"><?= $loa ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($lwl) && !empty($lwl)){?>
                        <th colspan="2"><?php _e('LWL','sailboat') ?>:</th>
                        <td colspan="2"><?= $lwl ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($beam) && !empty($beam)){?>
                        <th colspan="2"><?php _e('BEAM','sailboat') ?>:</th>
                        <td colspan="2"><?= $beam ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($disp) && !empty($disp)){?>
                        <th colspan="2"><?php _e('DISPLACEMENT','sailboat') ?>:</th>
                        <td colspan="2"><?= $disp ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($sa) && !empty($sa)){?>
                        <th colspan="2"><?php _e('SAIL AREA','sailboat') ?>:</th>
                        <td colspan="2"><?= $sa ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($saDispRatio) && !empty($saDispRatio)){?>
                        <th colspan="2"><?php _e('SA/Disp','sailboat') ?>:</th>
                        <td colspan="2"><?= $saDispRatio ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($balDispRatio) && !empty($balDispRatio)){?>
                        <th colspan="2"><?php _e('Bal/Disp','sailboat') ?>:</th>
                        <td colspan="2"><?= $balDispRatio ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($dispLenRatio) && !empty($dispLenRatio)){?>
                        <th colspan="2"><?php _e('Disp/Len','sailboat') ?>:</th>
                        <td colspan="2"><?= $dispLenRatio ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($comfortRatio) && !empty($comfortRatio)){?>
                        <th colspan="2"><?php _e('Comfort ratio','sailboat') ?>:</th>
                        <td colspan="2"><?= $comfortRatio ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($capsizeRatio) && !empty($capsizeRatio)){?>
                        <th colspan="2"><?php _e('Capsize screening Formula','sailboat') ?>:</th>
                        <td colspan="2"><?= $capsizeRatio ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($sNumber) && !empty($sNumber)){?>
                        <th colspan="2"><?php _e('S#','sailboat') ?>:</th>
                        <td colspan="2"><?= $sNumber ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($hullSpeed) && !empty($hullSpeed)){?>
                        <th colspan="2"><?php _e('Hull speed','sailboat') ?>:</th>
                        <td colspan="2"><?= $hullSpeed ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($immersion) && !empty($immersion)){?>
                        <th colspan="2"><?php _e('Pounds/Inch Immersion','sailboat') ?>:</th>
                        <td colspan="2"><?= $immersion ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($SAFore) && !empty($SAFore)){?>
                        <th colspan="2"><?php _e('SA Fore','sailboat') ?>:</th>
                        <td colspan="2"><?= $SAFore ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($SAMain) && !empty($SAMain)){?>
                        <th colspan="2"><?php _e('SA Main','sailboat') ?>:</th>
                        <td colspan="2"><?= $SAMain ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($SATotal) && !empty($SATotal)){?>
                        <th colspan="2"><?php _e('SA Total','sailboat') ?>:</th>
                        <td colspan="2"><?= $SATotal ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($DisplCalc) && !empty($DisplCalc)){?>
                        <th colspan="2"><?php _e('SA/Disp (calculated)','sailboat') ?>:</th>
                        <td colspan="2"><?= $DisplCalc ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if(isset($estForestayLen) && !empty($estForestayLen)){?>
                        <th colspan="2"><?php _e('Est. Forestay length','sailboat') ?>:</th>
                        <td colspan="2"><?= $estForestayLen ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>