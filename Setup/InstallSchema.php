<?php
namespace Amaddatu\LoginLog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // need a table to keep track of 
        // - event log id (id) this will be the auto increment column
        // - store id (store_id) this will come from the session
        // - customer id (customer_id) this will come from the session
        // - customer remote ip (remote_ip) this will come from the request
        // - event time (event_time) this will be the database time
        // - event type (event_type) this will be the type of event ... potentially success and failure logins
        // - user agent (user_agent) this is the browser's identity string

        $installer = $setup;
        $installer->startSetup();
        
        //START table setup
        $table = $installer->getConnection()->newTable(
        $installer->getTable('am_loginlog_events')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
            'Event Log Entity ID'
        )->addColumn(
            'store_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'nullable' => false, 'unsigned' => true, ],
            'Store Id'
        )->addColumn(
            'customer_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [ 'nullable' => false, 'unsigned' => true, ],
            'Customer Id'
        )->addColumn(
            'remote_ip',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Remote IP Address'
        )->addColumn(
            'event_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE, ],
            'Event Time'
        )->addColumn(
            'event_type',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [ 'nullable' => false, ],
            'Event Type'
        )->addColumn(
            'user_agent',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            512,
            [ 'nullable' => false, ],
            'User Agent'
        );
        $installer->getConnection()->createTable($table);
        //END table setup
        $installer->endSetup();
    }
}