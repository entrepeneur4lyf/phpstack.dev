import React from 'react';
import { Container, Title, Text, Button, Group, List, ThemeIcon, rem } from '@mantine/core';
import { IconCheck } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function HeroBullets() {
  const { hero } = useComponent();

  const items = hero.features.map((feature) => (
    <List.Item key={feature}>
      <Group gap={10} mt={5}>
        <ThemeIcon size={20} radius="xl" className="bg-blue-600 dark:bg-blue-500">
          <IconCheck style={{ width: rem(12), height: rem(12) }} />
        </ThemeIcon>
        <Text c="dimmed">{feature}</Text>
      </Group>
    </List.Item>
  ));

  return (
    <Container size="lg">
      <div className="flex flex-col lg:flex-row gap-8 items-center py-16">
        <div className="flex-1">
          <Title className="text-4xl lg:text-5xl font-bold leading-tight">
            {hero.title}
          </Title>
          <Text c="dimmed" mt="md">
            {hero.description}
          </Text>

          <List
            mt={30}
            spacing="sm"
            size="sm"
            icon={
              <ThemeIcon size={20} radius="xl">
                <IconCheck style={{ width: rem(12), height: rem(12) }} />
              </ThemeIcon>
            }
          >
            {items}
          </List>

          <Group mt={30}>
            <Button radius="xl" size="md" className="bg-blue-600 hover:bg-blue-700">
              {hero.primaryAction}
            </Button>
            <Button variant="default" radius="xl" size="md">
              {hero.secondaryAction}
            </Button>
          </Group>
        </div>
        <div className="flex-1">
          <img src={hero.image} className="w-full h-auto" alt="" />
        </div>
      </div>
    </Container>
  );
}
