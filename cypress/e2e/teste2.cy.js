describe('Company Read', () => {
  it('Company index', () => {
    cy.visit('http://127.0.0.1:8000/companies');
  });
});
describe('Create Company', () => {
  it('should create a new company', () => {
    cy.visit('http://127.0.0.1:8000/companies/create');

    cy.get('input[name="name"]').type('Example Company');
    cy.get('input[name="email"]').type('example@example.com');
    cy.get('input[name="address"]').type('123 Main Street');

    cy.get('form').submit();

  
    cy.contains('Company has been created successfully.');
  });
});

describe('Update Company', () => {
  it('should update company details', () => {
    cy.visit('http://127.0.0.1:8000/companies');

   
    cy.get('tbody tr').first().find('a').eq(0).click();

  
    cy.get('input[name="name"]').clear().type('Updated Company');
    cy.get('input[name="email"]').clear().type('updated@example.com');
    cy.get('input[name="address"]').clear().type('456 Updated Street');

    cy.get('form').submit();

   
    cy.contains('Company Has Been updated successfully');
  });
});
describe('Delete Company', () => {
  it('should delete a company', () => {
    cy.visit('http://127.0.0.1:8000/companies');

   cy.get('tbody tr').first().find('form button').eq(1).wait(2000).should('be.visible').click();

   //cy.get('tbody tr').first().find('form button').eq(1).click();

    
    cy.on('window:confirm', () => true);

    
    cy.contains('Company has been deleted successfully');
  });
});
