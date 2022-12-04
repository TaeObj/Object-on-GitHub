<div class="wrap">
    <div id="icon-tools" class="icon32"></div>
    <h1><?php esc_html_e('Taxes', WCPM_DOMAIN); ?></h1>
    <div class="wcpm-primary-rebate">
        <form action="options.php" method="POST">
            <?php settings_fields('wcpm-taxes-group'); ?>
            <?php do_settings_sections('wcpm-taxes-group'); ?>
            <div class="form-input">
                <label for="wcpm_primary_rebate"><?php _e("Primary Rebate", WCPM_DOMAIN) ?>:</label>
                <input type="number" id="wcpm_primary_rebate" name="wcpm_primary_rebate"
                    value="<?php echo get_option('wcpm_primary_rebate') ?>">
            </div>
            <input type="submit" name="save_primary_rebate" value="<?php _e('save', WCPM_DOMAIN) ?>" class="button">
        </form>
    </div>

    <div class="add-new-bracket-wrap single-bracket">
        <a href="#" class="add-new-bracket button button-primary"><?php _e('Add New Bracket', WCPM_DOMAIN) ?></a>
        <a href="#" class="hide-form button" style="display: none;"><?php _e('cancel', WCPM_DOMAIN) ?></a>
        <form class="wcpm-bracket-tax-form" id="wcpm-create-new-bracket-form" method="POST" style="display: none;">
            <div class="form-input">
                <label for="bracket_name"><?php _e('Name', WCPM_DOMAIN) ?>:</label>
                <input type="text" class="bracket_name" name="bracket_name" id="bracket_name" required>
            </div>
            <div class="form-input multi-inputs">
                <div>
                    <label for="bracket_from"><?php _e('From', WCPM_DOMAIN) ?>:</label>
                    <input type="number" class="bracket_from" name="bracket_from" id="bracket_from" required>
                </div>
                <div>
                    <label for="bracket_to_0"><?php _e('To', WCPM_DOMAIN) ?>:</label>
                    <input data-bracket_id="<?php echo 0 ?>" class="bracket_to" type="number" name="bracket_to"
                        id="bracket_to_0" required>
                </div>

            </div>

            <div class="form-input multi-inputs">
                <div>
                    <label for="bracket_rate_0"><?php _e('Rate', WCPM_DOMAIN) ?>:</label>
                    <input data-bracket_id="<?php echo 0 ?>" class="bracket_rate" type="number" step="0.01"
                        name="bracket_rate" id="bracket_rate_0" required>
                </div>
                <div>
                    <label for="cumulative_tax_0"><?php _e('Cumulative Tax', WCPM_DOMAIN) ?>:</label>
                    <input type="text" class="cumulative_tax" id="cumulative_tax_0" readonly>
                </div>
            </div>
            <div class="form-action">
                <input type="submit" name="submit_bracket_form" id="submit_bracket_form"
                    value="<?php _e('Save', WCPM_DOMAIN) ?>" class="button">
            </div>
        </form>
    </div>
    <?php if ($brackets) { ?>
    <div id="accordion" class="single-bracket">
        <?php foreach ($brackets as $bracket) { ?>
        <h3><?php echo $bracket['bracket_name'] ?></h3>
        <div>
            <form class="wcpm-bracket-tax-form" method="POST">
                <input type="hidden" name="bracket_id" value="<?php echo $bracket['id'] ?>">
                <div class="form-input">
                    <label for="bracket_name_<?php echo $bracket['id'] ?>"><?php _e('Name', WCPM_DOMAIN) ?>:</label>
                    <input type="text" class="bracket_name" name="bracket_name"
                        id="bracket_name_<?php echo $bracket['id'] ?>" value="<?php echo $bracket['bracket_name'] ?>"
                        required>
                </div>
                <div class="form-input multi-inputs">
                    <div>
                        <label for="bracket_from_<?php echo $bracket['id'] ?>"><?php _e('From', WCPM_DOMAIN) ?>:</label>
                        <input type="number" class="bracket_from" name="bracket_from"
                            id="bracket_from_<?php echo $bracket['id'] ?>"
                            value="<?php echo $bracket['bracket_from'] ?>" required>
                    </div>
                    <div>
                        <label for="bracket_to_<?php echo $bracket['id'] ?>"><?php _e('To', WCPM_DOMAIN) ?>:</label>
                        <input class="bracket_to" data-bracket_id="<?php echo $bracket['id'] ?>" type="number"
                            name="bracket_to" id="bracket_to_<?php echo $bracket['id'] ?>"
                            value="<?php echo $bracket['bracket_to'] ?>" required>
                    </div>
                </div>
                <div class="form-input multi-inputs">
                    <div>
                        <label for="bracket_rate_<?php echo $bracket['id'] ?>"><?php _e('Rate', WCPM_DOMAIN) ?>:</label>
                        <input class="bracket_rate" data-bracket_id="<?php echo $bracket['id'] ?>" type="number"
                            step="0.01" name="bracket_rate" id="bracket_rate_<?php echo $bracket['id'] ?>"
                            value="<?php echo $bracket['rate'] ?>" required>
                    </div>
                    <div>
                        <label
                            for="cumulative_tax_<?php echo $bracket['id'] ?>"><?php _e('Cumulative Tax', WCPM_DOMAIN) ?>:</label>
                        <input type="text" class="cumulative_tax" id="cumulative_tax_<?php echo $bracket['id'] ?>"
                            value="<?php echo $bracket['cumulative_tax'] ?>" readonly>
                    </div>
                </div>
                <div class="form-action">
                    <input type="submit" name="edit_bracket_form" id="edit_bracket_form"
                        value="<?php _e('Save', WCPM_DOMAIN) ?>" class="button">
                    <a href="#" data-bracket_id="<?php echo $bracket['id'] ?>"
                        class="delete-bracket button button-secondary"><?php _e('Delete', WCPM_DOMAIN) ?></a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

</div>