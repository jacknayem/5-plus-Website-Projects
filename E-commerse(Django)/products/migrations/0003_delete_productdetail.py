# Generated by Django 3.2.4 on 2021-06-28 18:55

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0002_productdetail'),
    ]

    operations = [
        migrations.DeleteModel(
            name='ProductDetail',
        ),
    ]
