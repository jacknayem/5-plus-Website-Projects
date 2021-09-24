from django.contrib import admin
from .models import MainFeature, ProductType, SubMenuBanner, Productinfo, indexbanner, ContactInfo
from .models import Hotproducttype, ProductDiscount, cartOrderItems, cartOrder
# Register your models here.
admin.site.register(MainFeature)


class ProductTypeAdmin(admin.ModelAdmin):
    list_display = ('TypesName', 'FeatureName')


admin.site.register(ProductType, ProductTypeAdmin)


class SubMenuBannerAdmin(admin.ModelAdmin):
    list_display = ('FeatureName', 'image_tag')


admin.site.register(SubMenuBanner, SubMenuBannerAdmin)

class HotproducttypeAdmin(admin.ModelAdmin):
    list_display = ('Name', 'image_tag')


admin.site.register(Hotproducttype, HotproducttypeAdmin)


class ContactInfoAdmin(admin.ModelAdmin):
    list_display = ('ContactWay', 'details')


admin.site.register(ContactInfo, ContactInfoAdmin)

class ProductDiscountAdmin(admin.ModelAdmin):
    list_display = ('Trend', 'DiscountMessage', 'image_tag')
admin.site.register(ProductDiscount, ProductDiscountAdmin)


class ProductinfoAdmin(admin.ModelAdmin):
    list_display = ('Title', 'MainFeature', 'ProductType', 'Price', 'image_tag', 'Hot', 'status')
    list_editable = ('Hot',)


admin.site.register(Productinfo, ProductinfoAdmin)


class IndexBannerAdmin(admin.ModelAdmin):
    list_display = ('id', 'alt_text', 'image')


admin.site.register(indexbanner, IndexBannerAdmin)


class cartOrderAdmin(admin.ModelAdmin):
    list_display = ('CustomerName', 'CustomerNumber',  'CustomerArea', 'CustomerAddress', 'Remark', 'OrderDate', 'PaidStatus')
    search_fields = ('CustomerNumber',)
    readonly_fields = ('CustomerName','CustomerNumber', 'CustomerArea')

    filter_horizontal = ()
    list_filter = ()
    fieldsets = ()
admin.site.register(cartOrder,cartOrderAdmin)

class cartOrderItemsAdmin(admin.ModelAdmin):
    list_display = ('order', 'invoice_no',  'item', 'image_tag', 'Qty', 'Price', 'TotalPrice')
    search_fields = ('invoice_no',)

    filter_horizontal = ()
    list_filter = ()
    fieldsets = ()
admin.site.register(cartOrderItems,cartOrderItemsAdmin)
