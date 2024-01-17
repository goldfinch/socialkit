<?php

namespace Goldfinch\SocialMedia\Blocks;

use DNADesign\Elemental\Models\BaseElement;

class SocialMediaBlock extends BaseElement
{
    private static $table_name = 'SocialMediaBlock';
    private static $singular_name = 'Social Media';
    private static $plural_name = 'Social Media';

    private static $db = [
        'FeedType' => 'Enum("facebook,instagram,mixed", "mixed")',
        'FeedLimit' => 'Int',
    ];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-block-instagram';

    private static $has_one = [];

    private static $owns = [];

    private static $field_labels = [
        'FeedType' => 'Type',
        'FeedLimit' => 'Post limit',
    ];

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
