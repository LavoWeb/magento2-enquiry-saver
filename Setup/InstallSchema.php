<?php

namespace LavoWeb\EnquirySaver\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('lavoweb_enquirysaver_enquiries');

        if (!$installer->tableExists('lavoweb_enquirysaver_enquiries')) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'enquiry_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Enqiury ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Name'
                )
                ->addColumn(
                    'email',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Email'
                )
                ->addColumn(
                    'telephone',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Telephone'
                )
                ->addColumn(
                    'comment',
                    Table::TYPE_TEXT,
                    null,
                    [
                        'nullable' => false,
                        'default' => ''
                    ],
                    'Comment'
                )
                ->addColumn(
                    'store_id',
                    Table::TYPE_SMALLINT,
                    null,
                    [
                        'nullable' => false
                    ],
                    'Store ID'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_TIMESTAMP,
                    null,
                    [
                        'nullable' => false,
                        'default' => Table::TIMESTAMP_INIT
                    ],
                    'Created At'
                );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
