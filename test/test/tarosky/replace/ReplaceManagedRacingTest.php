<?php

// Race condition occurred during wp_cache_replace() to an existing managed key.
class ReplaceManagedRacingTest extends ObjectCacheTestCase {
    public function setUp(): void {
        parent::setUp();

        wp_cache_set(self::KEY, self::VAL_SUP);
        $this->get_and_store_version();
        $this->set_rival_version();
        $this->set_sup_2_value();
    }

    use ExamineCacheReplace;
    use TestExamFails;
    use TestRedisValNotExist; // Removed
    use TestRedisVersionRenewed; // Updated
    use TestInternalVersionNotExist;
    use TestInternalValNotExist; // Removed
    use ConnectionTests;
}
