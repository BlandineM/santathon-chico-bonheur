import { Component, OnInit } from "@angular/core";
import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
@Injectable()
export class ConfigService {
  private people = [
    {
      id: "1",
      author: "Ribéry",
      citation: "Inconsciemment, il faut pas s'endormir"
    }
  ];
  constructor(private httpClient: HttpClient) {}

  getAppareilsFromServer() {
    this.httpClient
      .get<any[]>("http://localhost:5000/people/test.json")
      .subscribe(
        response => {
          this.people = response;
        },
        error => {
          console.log("Erreur ! : " + error);
        }
      );
  }
}
@Component({
  selector: "app-citation-cards",
  templateUrl: "./citation-cards.component.html",
  styleUrls: ["./citation-cards.component.scss"]
})
export class CitationCardsComponent implements OnInit {
  constructor() {}

  ngOnInit() {}
}
