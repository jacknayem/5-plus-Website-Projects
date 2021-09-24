# Generated by Django 3.2.4 on 2021-07-01 20:09

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0016_auto_20210702_0127'),
    ]

    operations = [
        migrations.CreateModel(
            name='ContactInfo',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('ContactWay', models.CharField(choices=[('ADDRESS', 'ADDRESS'), ('PHONE', 'PHONE'), ('EMAIL', 'Junior'), ('SERVING DAY', 'SERVING DAY')], max_length=50)),
                ('details', models.CharField(max_length=100)),
            ],
            options={
                'verbose_name_plural': '4 Contact Info',
            },
        ),
    ]