# Generated by Django 3.2.4 on 2021-07-06 05:46

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0026_auto_20210706_1110'),
    ]

    operations = [
        migrations.AlterField(
            model_name='productinfo',
            name='ProductImage',
            field=models.ImageField(upload_to='images/products'),
        ),
    ]
