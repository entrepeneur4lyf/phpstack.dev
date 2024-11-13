import React from 'react';
import { Title, Text, Button, Container } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function NothingFoundBackground() {
  const { error } = useComponent();

  return (
    <div 
      className="min-h-screen bg-cover bg-center flex items-center"
      style={{ 
        backgroundImage: `linear-gradient(250deg, rgba(130, 201, 30, 0) 0%, #062343 70%), url(${error.image})` 
      }}
    >
      <Container size={720} className="text-center text-white">
        <Title className="text-4xl font-bold">
          {error.title}
        </Title>
        
        <Text size="lg" className="mt-4">
          {error.description}
        </Text>
        
        <Button 
          variant="white" 
          size="md"
          className="mt-6"
        >
          {error.action}
        </Button>
      </Container>
    </div>
  );
}
