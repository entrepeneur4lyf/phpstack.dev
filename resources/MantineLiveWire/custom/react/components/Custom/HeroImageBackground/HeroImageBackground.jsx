import React from 'react';
import { Container, Title, Text, Button, Group } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function HeroImageBackground() {
  const { hero } = useComponent();

  return (
    <div 
      className="min-h-screen relative bg-cover bg-center"
      style={{ backgroundImage: `url(${hero.backgroundImage})` }}
    >
      <div className="absolute inset-0 bg-black/70" />

      <Container size="lg" className="relative h-full">
        <div className="h-full flex flex-col justify-center py-16 max-w-[600px]">
          <Title className="text-4xl lg:text-5xl font-bold leading-tight text-white">
            {hero.title}
          </Title>

          <Text className="text-gray-300 mt-6">
            {hero.description}
          </Text>

          <Group mt={30}>
            <Button radius="xl" size="md" className="bg-blue-600 hover:bg-blue-700">
              {hero.primaryAction}
            </Button>
            <Button 
              variant="white" 
              radius="xl" 
              size="md"
              className="text-gray-900 hover:bg-gray-100"
            >
              {hero.secondaryAction}
            </Button>
          </Group>
        </div>
      </Container>
    </div>
  );
}
