import { Component, OnInit } from '@angular/core';
import { Input } from '@angular/core';
import { Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-vote-button',
  templateUrl: './vote-button.component.html',
  styleUrls: ['./vote-button.component.scss']
})
export class VoteButtonComponent implements OnInit {

  constructor() { 
  
  }

  ngOnInit() {
  }

  @Input() private people;
  @Output() vote = new EventEmitter();
}


