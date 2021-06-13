<?php

use App\Strategies\RewardPointsStrategy\StandardRewardPointsStrategy;

return [
    'templateDirectory' => BASE_PATH . "/assets/templates",
    'currentRewardPointStragey' => StandardRewardPointsStrategy::class,
];