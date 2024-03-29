<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "summary".
 *
 * @property string $id_buku
 * @property string $penulis
 * @property string $judul
 * @property string $tema
 * @property string $volume
 * @property string $edisi
 * @property string $tahun
 * @property int $stok
 * @property string $file
 * @property Rak $rak
 */
class Summary extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'summary';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buku', 'penulis', 'judul', 'volume', 'edisi', 'id_rak', 'tahun', 'stok'], 'required'],
            [['stok', 'id_rak'], 'integer'],
            [['id_buku','penulis', 'file'], 'string'],
            [['tahun'], 'safe'],
            [['judul', 'tema'], 'string', 'max' => 255],
            [['volume', 'edisi'], 'string', 'max' => 6],
            [['id_buku'], 'unique'],
            [['file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_buku' => 'Id Buku',
            'penulis' => 'Penulis',
            'judul' => 'Judul',
            'tema' => 'Tema',
            'volume' => 'Volume',
            'edisi' => 'Edisi',
            'id_rak' => 'Id Rak',
            'tahun' => 'Tahun',
            'stok' => 'Stok',
            'file' => 'File',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRak()
    {
        return $this->hasOne(Rak::className(), ['id_rak' => 'id_rak']);
    }
}
