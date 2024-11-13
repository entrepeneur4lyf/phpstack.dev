import React from 'react';
import { Container, Title, SimpleGrid, Text } from '@mantine/core';
import { IconTruck, IconCertificate, IconCoin } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

const icons = {
  'truck': IconTruck,
  'certificate': IconCertificate,
  'coin': IconCoin,
};

export default function FeaturesAsymmetrical() {
  const { features } = useComponent();

  const items = features.items.map((feature) => {
    const Icon = icons[feature.icon];

    return (
      <div key={feature.title}>
        <div className="flex items-center mb-4">
          <Icon size={30} stroke={2} className="text-blue-600 dark:text-blue-500" />
          <Text size="lg" fw={500} ml="md">
            {feature.title}
          </Text>
        </div>
        <Text c="dimmed">
          {feature.description}
        </Text>
      </div>
    );
  });

  return (
    <Container size="lg" py="xl">
      <SimpleGrid cols={{ base: 1, sm: 3 }} spacing={50}>
        {items}
      </SimpleGrid>
    </Container>
  );
}
