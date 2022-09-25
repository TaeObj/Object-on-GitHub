<p class="all-note">{{ $defaultRulesetSetting->ruleset_name . " : When active applied to all product"}}</p>
<form method="POST" action="{{ route('ruleset-setting.update',['id' => $defaultRulesetSetting->id ]) }}">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <label for="ruleset_name" class="col-md-3 col-form-label">{{ __("Ruleset name (admin view)") }}</label>
        <div class="col-md-9">
            <input type="text" name="ruleset_name" class="form-control"
                placeholder="{{ __('SetEditSetNameTitlePlaceholder') }}"
                value="{{ $defaultRulesetSetting->ruleset_name }}" id="ruleset_name">
        </div>
    </div>

    {{-- MultiVariants Title --}}
    <div class="row mb-3">
        <label for="multi_variants_title"
            class="col-md-3 col-form-label">{{ __("MultiVariants Title (store view)") }}</label>
        <div class="col-md-9">
            <div class="with-reset-btn">
                <input type="text" name="multi_variants_title" class="form-control"
                    placeholder="{{ __('Ex: Bulk product order')}}"
                    value="{{ $defaultRulesetSetting->multi_variants_title }}" id="multi_variants_title"
                    data-default-value="{{ DEFAULT_MULTI_VARIANTS_TITLE }}">
                <button type="button" class="btn btn-info reset-field" data-bs-toggle="tooltip"
                    title="{{ __('Reset') }}" data-reset-field-id="multi_variants_title">
                    <svg data-name="Layer 1" id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"
                        style="">
                        <path
                            d="M64,256H34A222,222,0,0,1,430,118.15V85h30V190H355V160h67.27A192.21,192.21,0,0,0,256,64C150.13,64,64,150.13,64,256Zm384,0c0,105.87-86.13,192-192,192A192.21,192.21,0,0,1,89.73,352H157V322H52V427H82V393.85A222,222,0,0,0,478,256Z">
                        </path>
                    </svg>
                </button>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="show_multi_variants_title" type="checkbox" role="switch"
                    id="show_multi_variants_title" value="1"
                    {{ $defaultRulesetSetting->show_multi_variants_title ? "checked" : "" }}>
                <label class="form-check-label" for="show_multi_variants_title">{{ __("Show-Hide") }}</label>
            </div>
        </div>
    </div>

    {{-- Sub title --}}
    <div class="row mb-3">
        <label for="multi_variants_sub_title" class="col-md-3 col-form-label">{{ __("Sub title (store view)") }}</label>
        <div class="col-md-9">
            <div class="with-reset-btn">
                <input type="text" name="multi_variants_sub_title" class="form-control"
                    placeholder="{{ __('Ex: select your variants and quantity')}}"
                    value="{{ $defaultRulesetSetting->multi_variants_sub_title }}" id="multi_variants_sub_title"
                    data-default-value="{{ DEFAULT_MULTI_VARIANTS_SUB_TITLE }}">
                <button type="button" class="btn btn-info reset-field" data-bs-toggle="tooltip"
                    title="{{ __('Reset') }}" data-reset-field-id="multi_variants_sub_title"><svg data-name="Layer 1"
                        id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" style="
">
                        <path
                            d="M64,256H34A222,222,0,0,1,430,118.15V85h30V190H355V160h67.27A192.21,192.21,0,0,0,256,64C150.13,64,64,150.13,64,256Zm384,0c0,105.87-86.13,192-192,192A192.21,192.21,0,0,1,89.73,352H157V322H52V427H82V393.85A222,222,0,0,0,478,256Z">
                        </path>
                    </svg></button>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="show_multi_variants_sub_title" type="checkbox" role="switch"
                    id="show_multi_variants_sub_title" value="1"
                    {{ !empty($defaultRulesetSetting->show_multi_variants_sub_title) ? "checked" : ""}}>
                <label class="form-check-label" for="show_multi_variants_sub_title">{{ __("Show-Hide") }}</label>
            </div>
        </div>
    </div>

    {{-- Text before price --}}
    <div class="row mb-3">
        <label for="text_before_price" class="col-md-3 col-form-label">{{ __("Text before price") }}</label>
        <div class="col-md-9">
            <div class="with-reset-btn">
                <input type="text" name="text_before_price" class="form-control" placeholder="{{ __('Ex: Price')}}"
                    value="{{ $defaultRulesetSetting->text_before_price }}" id="text_before_price"
                    data-default-value="{{ DEFAULT_TEXT_BEFORE_PRICE }}">
                <button type="button" class="btn btn-info reset-field" data-bs-toggle="tooltip"
                    title="{{ __('Reset') }}" data-reset-field-id="text_before_price"><svg data-name="Layer 1"
                        id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" style="
">
                        <path
                            d="M64,256H34A222,222,0,0,1,430,118.15V85h30V190H355V160h67.27A192.21,192.21,0,0,0,256,64C150.13,64,64,150.13,64,256Zm384,0c0,105.87-86.13,192-192,192A192.21,192.21,0,0,1,89.73,352H157V322H52V427H82V393.85A222,222,0,0,0,478,256Z">
                        </path>
                    </svg></button>
            </div>
        </div>
    </div>

    {{-- Text before the quantity --}}
    <div class="row mb-3">
        <label for="text_before_quantity"
            class="col-md-3 col-form-label">{{ __("Text before the quantity field") }}</label>
        <div class="col-md-9">
            <div class="with-reset-btn">
                <input type="text" name="text_before_quantity" class="form-control"
                    placeholder="{{ __('Ex: Quantity')}}" value="{{ $defaultRulesetSetting->text_before_quantity }}"
                    id="text_before_quantity" data-default-value="{{ DEFAULT_TEXT_BEFORE_QUANTITY }}">
                <button type="button" class="btn btn-info reset-field" data-bs-toggle="tooltip"
                    title="{{ __('Reset') }}" data-reset-field-id="text_before_quantity"><svg data-name="Layer 1"
                        id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" style="
">
                        <path
                            d="M64,256H34A222,222,0,0,1,430,118.15V85h30V190H355V160h67.27A192.21,192.21,0,0,0,256,64C150.13,64,64,150.13,64,256Zm384,0c0,105.87-86.13,192-192,192A192.21,192.21,0,0,1,89.73,352H157V322H52V427H82V393.85A222,222,0,0,0,478,256Z">
                        </path>
                    </svg></button>
            </div>
        </div>

    </div>

    {{-- Available stock quantity --}}
    <div class="row mb-3">
        <label for="available_stock_quantity"
            class="col-md-3 col-form-label">{{ __("Available stock quantity") }}</label>
        <div class="col-md-9">
            <div class="with-reset-btn">
                <input type="text" name="available_stock_quantity" class="form-control"
                    placeholder="{{ __('Ex: select your variants and quantity')}}"
                    value="{{ $defaultRulesetSetting->available_stock_quantity }}" id="available_stock_quantity"
                    data-default-value="{{ DEFAULT_AVAILABLE_STOCK_QUANTITY }}">
                <button type="button" class="btn btn-info reset-field" data-bs-toggle="tooltip"
                    title="{{ __('Reset') }}" data-reset-field-id="available_stock_quantity"><svg data-name="Layer 1"
                        id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" style="
">
                        <path
                            d="M64,256H34A222,222,0,0,1,430,118.15V85h30V190H355V160h67.27A192.21,192.21,0,0,0,256,64C150.13,64,64,150.13,64,256Zm384,0c0,105.87-86.13,192-192,192A192.21,192.21,0,0,1,89.73,352H157V322H52V427H82V393.85A222,222,0,0,0,478,256Z">
                        </path>
                    </svg></button>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" name="show_available_stock_quantity" type="checkbox" role="switch"
                    id="show_available_stock_quantity" value="1"
                    {{ !empty($defaultRulesetSetting->show_available_stock_quantity) ? "checked" : ""}}>
                <label class="form-check-label" for="show_available_stock_quantity">{{ __("Show-Hide") }}</label>
            </div>
        </div>

    </div>

    {{-- "Add to cart" button --}}
    <div class="row mb-3">
        <label for="add_to_cart_btn_label" class="col-md-3 col-form-label">{{ __('"Add to cart" button') }}</label>
        <div class="col-md-9">
            <div class="with-reset-btn">
                <input type="text" name="add_to_cart_btn_label" class="form-control"
                    placeholder="{{ __('SetEditAddCartTitlePlaceholder')}}"
                    value="{{ $defaultRulesetSetting->add_to_cart_btn_label }}" id="add_to_cart_btn_label"
                    data-default-value="{{ DEFAULT_ADD_TO_CART_BTN_LABEL }}">
                <button type="button" class="btn btn-info reset-field" data-bs-toggle="tooltip"
                    title="{{ __('Reset') }}" data-reset-field-id="add_to_cart_btn_label"><svg data-name="Layer 1"
                        id="Layer_1" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" style="
">
                        <path
                            d="M64,256H34A222,222,0,0,1,430,118.15V85h30V190H355V160h67.27A192.21,192.21,0,0,0,256,64C150.13,64,64,150.13,64,256Zm384,0c0,105.87-86.13,192-192,192A192.21,192.21,0,0,1,89.73,352H157V322H52V427H82V393.85A222,222,0,0,0,478,256Z">
                        </path>
                    </svg></button>
            </div>
        </div>
    </div>

    {{-- Show variant icons? --}}
    <div class="row mb-3">
        <label for="show_variant_icons" class="col-md-3 col-form-label">{{ __("Show variant icons?") }}</label>
        <div class="col-md-9">
            <div class="form-check form-switch">
                <input class="form-check-input" name="show_variant_icons" type="checkbox" role="switch"
                    id="show_variant_icons" value="1"
                    {{ !empty($defaultRulesetSetting->show_variant_icons) ? "checked" : ""}}>
                <label class="form-check-label" for="show_variant_icons">{{ __("Yes-No") }}</label>
            </div>
        </div>
    </div>

    {{-- Show variant option title? --}}
    <div class="row mb-3">
        <label for="show_variant_option_title"
            class="col-md-3 col-form-label">{{ __("Show variant option title?") }}</label>
        <div class="col-md-9">
            <div class="form-check form-switch">
                <input class="form-check-input" name="show_variant_option_title" type="checkbox" role="switch"
                    id="show_variant_option_title" value="1"
                    {{ !empty($defaultRulesetSetting->show_variant_option_title) ? "checked" : "" }}>
                <label class="form-check-label" for="show_variant_option_title">{{ __("Yes-No") }}</label>
            </div>
        </div>
    </div>

    {{-- Custom --}}
    <div class="row mb-3">
        <label for="custom_option" class="col-md-3 col-form-label">{{ __("Custom") }}</label>
        <div class="col-md-9">
            <input type="text" name="custom_option" class="form-control"
                placeholder="{{ __('{title}<br>SKU : {sku}<br>Weight : {weight}{weight_unit}') }}" id="custom_option"
                value="{{ $defaultRulesetSetting->custom_option }}">
        </div>
    </div>

    {{-- Variant price display type --}}
    <div class="row mb-3">
        <label for="variant_price_display_type"
            class="col-md-3 col-form-label">{{ __("Variant price display type") }}</label>
        <div class="col-md-9">
            <input type="radio" class="btn-check" name="variant_price_display_type" id="info-outlined2"
                autocomplete="off" value="total"
                {{ $defaultRulesetSetting->variant_price_display_type == VARIANT_PRICE_DISPLAY_TYPE_TOTAL ? "checked" : "" }}>
            <label class="btn btn-outline-info" for="info-outlined2">{{ __("Total") }}</label>

            <input type="radio" class="btn-check" name="variant_price_display_type" id="info-outlined1"
                autocomplete="off" value="unit"
                {{ $defaultRulesetSetting->variant_price_display_type == VARIANT_PRICE_DISPLAY_TYPE_UNIT ? "checked" : "" }}>
            <label class="btn btn-outline-info" for="info-outlined1">{{ __("Unit") }}</label>

            <input type="radio" class="btn-check" name="variant_price_display_type" id="info-outlined3"
                autocomplete="off" value="hide"
                {{ $defaultRulesetSetting->variant_price_display_type == VARIANT_PRICE_DISPLAY_TYPE_HIDE ? "checked" : "" }}>
            <label class="btn btn-outline-info" for="info-outlined3">{{ __("Hide") }}</label>
        </div>
    </div>

    {{-- Show compare price? --}}
    <div class="row mb-3">
        <label for="show_compare_price" class="col-md-3 col-form-label">{{ __("Show compare price?") }}</label>
        <div class="col-md-9">
            <div class="form-check form-switch">
                <input class="form-check-input" name="show_compare_price" type="checkbox" role="switch"
                    id="show_compare_price" value="1"
                    {{ !empty($defaultRulesetSetting->show_compare_price) ? "checked" : "" }}>
                <label class="form-check-label" for="show_compare_price">{{ __("Show-Hide") }}</label>
            </div>
        </div>
    </div>

    {{-- If the variant is not in stock --}}
    <div class="row mb-3">
        <label for="out_of_stock_action"
            class="col-md-3 col-form-label">{{ __("If the variant is not in stock") }}</label>
        <div class="col-md-9">
            <select class="form-select" name="out_of_stock_action" id="out_of_stock_action">
                <option value="{{ OUT_OF_STOCK_ACTION_BADGE }}"
                    {{ $defaultRulesetSetting->out_of_stock_action == OUT_OF_STOCK_ACTION_BADGE ? "selected" : "" }}>
                    {{ __('Show Out of Stock badge') }}</option>
                <option value="{{ OUT_OF_STOCK_ACTION_SHOW }}"
                    {{ $defaultRulesetSetting->out_of_stock_action == OUT_OF_STOCK_ACTION_SHOW ? "selected" : "" }}>
                    {{ __('Show variants') }}</option>
                <option value="{{ OUT_OF_STOCK_ACTION_HIDE }}"
                    {{ $defaultRulesetSetting->out_of_stock_action == OUT_OF_STOCK_ACTION_HIDE ? "selected" : "" }}>
                    {{ __('Hide variants') }}</option>
            </select>
        </div>
    </div>

    {{-- Active for products without variant? --}}
    <div class="row mb-3">
        <label for="is_active_for_product_without_variant"
            class="col-md-3 col-form-label">{{ __("Active for products without variant?") }}</label>
        <div class="col-md-9">
            <div class="form-check form-switch">
                <input class="form-check-input" name="is_active_for_product_without_variant" type="checkbox"
                    role="switch" id="is_active_for_product_without_variant" value="1"
                    {{ !empty($defaultRulesetSetting->is_active_for_product_without_variant) ? "checked" : "" }}>
                <label class="form-check-label" for="is_active_for_product_without_variant">{{ __("Yes-No") }}</label>
            </div>
        </div>
    </div>

    {{-- Hide the default add to cart form? --}}
    <div class="row mb-3">
        <label for="hide_add_to_cart_form"
            class="col-md-3 col-form-label">{{ __("Hide the default add to cart form?") }}</label>
        <div class="col-md-9">
            <div class="form-check form-switch">
                <input class="form-check-input" name="hide_add_to_cart_form" type="checkbox" role="switch"
                    id="hide_add_to_cart_form" value="1"
                    {{ !empty($defaultRulesetSetting->hide_add_to_cart_form) ? "checked" : "" }}>
                <label class="form-check-label" for="hide_add_to_cart_form">{{ __("Yes-No") }}</label>
            </div>
        </div>
    </div>
    <div class="app-action">
        <button type="submit" class="btn btn-primary">{{ __("Submit") }}</button>
    </div>
</form>