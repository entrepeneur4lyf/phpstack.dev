import React from 'react';
import { Card, SimpleGrid, Text, UnstyledButton } from '@mantine/core';
import {
  IconCreditCard,
  IconBuildingBank,
  IconRepeat,
  IconReceiptRefund,
  IconReceipt,
  IconReceiptTax,
  IconReport,
  IconCashBanknote,
  IconCoin,
} from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

const icons = {
  'credit-card': IconCreditCard,
  'building-bank': IconBuildingBank,
  'repeat': IconRepeat,
  'receipt-refund': IconReceiptRefund,
  'receipt': IconReceipt,
  'receipt-tax': IconReceiptTax,
  'report': IconReport,
  'cash-banknote': IconCashBanknote,
  'coin': IconCoin,
};

export default function ActionsGrid() {
  const { items } = useComponent();

  const actions = items.map((item) => {
    const Icon = icons[item.icon];

    return (
      <UnstyledButton key={item.title} className="block p-4 hover:bg-gray-100 dark:hover:bg-gray-800">
        <Icon size={32} stroke={1.5} className="text-blue-600 dark:text-blue-400 mx-auto" />
        <Text size="xs" mt={7} ta="center">
          {item.title}
        </Text>
      </UnstyledButton>
    );
  });

  return (
    <Card withBorder radius="md" className="max-w-[400px]">
      <Card.Section className="p-4 border-b border-gray-200 dark:border-gray-800">
        <Text fz="lg" fw={500}>
          Services
        </Text>
      </Card.Section>

      <SimpleGrid cols={3} mt="md">
        {actions}
      </SimpleGrid>
    </Card>
  );
}
