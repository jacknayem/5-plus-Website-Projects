# Generated by Django 3.2.4 on 2021-07-01 14:57

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0012_productorder'),
    ]

    operations = [
        migrations.AlterField(
            model_name='productorder',
            name='ProductPrice',
            field=models.CharField(max_length=100),
        ),
        migrations.AlterField(
            model_name='productorder',
            name='ProductQty',
            field=models.CharField(max_length=100),
        ),
    ]