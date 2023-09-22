# Events In Products

## Product Published

ProductService::store => Event ProductReadyToPublished => Event ProductPublished

## Product Unpublished

ProductService::update (visibility) => Event ProductUnpublished
ProductService::destroy => Event ProductUnpublished

## Product Updated

ProductService::update => Event ProductUpdatedToPublished => Event ProductUpdated
