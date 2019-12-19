import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CitationCardsComponent } from './citation-cards.component';

describe('CitationCardsComponent', () => {
  let component: CitationCardsComponent;
  let fixture: ComponentFixture<CitationCardsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CitationCardsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CitationCardsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});