<?php
namespace Magestore\Staff\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context){
        $dataRows=[
            [
                'id' => 1,
                'name' => 'Bùi Quốc Huy',
                'email' => 'kenny@qhonline.info',
                'phone' => '0903087580',
                'position' => 'Founder',
                'status' => 1,
                'avatar' => 'staff/White_Power_Ranger_Subliminal_Message.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Nguyen Van Teo',
                'email' => 'vanteo@gmail.com',
                'phone' => '0903354595',
                'position' => 'Director',
                'status' => 1,
                'avatar' => 'staff/minato.png',
            ],
            [
                'id' => 3,
                'name' => 'Nguyen Van Tun',
                'email' => 'vantun@yahoo.com',
                'phone' => '0999351247',
                'position' => 'Worker',
                'status' => 1,
                'avatar' => 'staff/kakashi-avatar-009b.png',
            ],
            [
                'id' => 4,
                'name' => 'Tran Van Tung',
                'email' => 'tungtran@gmail.com',
                'phone' => '113',
                'position' => 'Shipper',
                'status' => 1,
                'avatar' => 'staff/thItachi.png',
            ],
            [
                'id' => 5,
                'name' => 'Truong Hoai Lam',
                'email' => 'hoailam@gmail.com',
                'phone' => '1174',
                'position' => 'Support',
                'status' => 0,
                'avatar' => 'staff/power.jpg'
            ],
            [
                'id' => 6,
                'name' => 'Tran Quang Phong',
                'email' => 'quangphong@yahoo.com',
                'phone' => '1154',
                'position' => 'Shipper',
                'status' => 0,
                'avatar' => 'staff/comi4ura_1.jpg',
            ]
        ];
        foreach($dataRows as $data){
            $setup->getConnection()->insert($setup->getTable("staff"),$data);
        }
    }
}